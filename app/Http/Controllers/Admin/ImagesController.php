<?php

namespace App\Http\Controllers\Admin;

// use Illuminate\Database\Seeder\ItemsTableSeeder;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use App\Item;
use Storage;
use Carbon\carbon;
use App\ImagesHistory;
use App\Http\Controllers\Controller;

class ImagesController extends Controller
{
    //念のためadminのuserだけしか使えなくするをもう一度書いておく
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
 
    
    
    
    //登録商品一覧表示
    public function index(Request $request)
    {
        $cond_title = $request->cond_title;  //$cond_titleはユーザーが入力した文字
        if ($cond_title != '') {
            // 検索されたら検索結果を取得する
            $items = Item::where('item_name', $cond_title)->paginate(20);   //ユーザーが入力した文字に一致するレコードを全て取得
        } else {                //Itemモデルに対してえwhereメソッドを指定して検索している
            // それ以外はすべての商品を取得する
            $items = Item::paginate(20);
        }
        return view('images/list', ['items' => $items, 'cond_title' => $cond_title]);
    }
    
    
    
    public function add()
    {
        return view('images.create');
    }
    
    
    
    
    //データベースに保存するまで
    public function create(Request $request)
    {
        $this->validate($request, Item::$rules);  //Itemモデルでバリデーションした（item_name,explanation,amount,item_pic_path)
        
        $item = new Item;
        $form = $request->all();
        
        //フォームに画像があれば保存する
        // フォームから画像が送信されてきたら、保存して、$item->item_pic__path に画像のパスを保存する
        if(isset($form['image_path'])) {  //issetは変数に値がセットされているか確認する方法、つまり$formに'image_path'があるか確認している
            $path = $request->file('image_path')->store('public/image');  //file('読み込みたいファイル名')
            $item->image_path = basename($path); //basenameはパスではなく最後のハッシュ化されたファイル名だけを取得する
        } else {
            $item->image_path = null;  //modelの方で'image_path'が空でも表示できるようにしている
        }
        
        // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
        // フォームから送信されてきたimageを削除する
        unset($form['image_path']);
        
        // データベースに保存する
        $item->fill($form)->save();
        
        return redirect('images/create');
    }
    
    
    
    
    
    public function edit(Request $request)
    {
        //Itemモデルからデータを取得する
        $item = Item::find($request->id);
        if(empty($item)) {
            abort(404);
        }
        return view('images/edit', ['item_form' => $item]);
    }
    
    
    public function update(Request $request)
    {
        //validationをかける
        $this->validate($request, Item::$rules);
        //Itemモデルからデータを取得する
        $item = Item::find($request->id);
        //送信されてきたフォームデータを格納する
        $item_form = $request->all();
        if (isset($item_form['image_path'])) { //issetは変数に値がセットされているか確認する方法、つまり$item_formに'item_picがあるか確認している
            $path = $request->file('image_path')->store('public/image');
            $item->image_path = basename($path);
            unset($item_form['image_path']);
        } elseif (isset($request->remove)) {
            $item->image_path = null;
            unset($item_form['remove']);
        }
        
        unset($item_form['_token']);
        unset($item_form['image_path']);
        unset($item_form['remove']);
        //該当するデータを上書きして保存する
        $item->fill($item_form)->save();
        
        $images_history = new ImagesHistory;
        $images_history->item_id = $item->id;
        $images_history->edited_at = Carbon::now();
        $images_history->save();
        
        return redirect('images/list');
    }
    
    
    public function delete(Request $request)
    {
        //該当するItem modelを取得
        $item = Item::find($request->id);
        //削除する
        $item->delete();
        return redirect('images/list');
    }
    
    
    
    
    
    
    // //フォームからファイルを受け取りS3にアップロードする処理
    // public function store(Request $request)
    // {
    //     $params = $request->validate([
    //         'item_pic' => 'required|file|image|max:4000',  //4000kb以下のファイルにする'image'
    //     ]);

    //     $file = $params['item_pic'];  //バリデーションかけたimageを$fileに入れる
    //     $fileContents = file_get_contents($file->getRealPath()); //file_get_contents=ファイルの内容を全て文字列で読み込む、getRealPath()でアップロードされたファイルのパスを取得

    //     $disk = Storage::disk('s3');  // config/filesystems.phpのs3を選択
    //     $disk->put($file->hashName(), $fileContents, 'public');  //S3にアップ、ここでpublic付けてないと一般には公開できない
    //                               //ファイル保存$disk->put('第１アップロード先パス', '第2アップロード対象のファイルデータ', '第3ファイルパーミッション')
    //     return redirect()->action('ImagesController@index');
    // }
    
    
    // //アップロードした画像の表示と削除処理
    // public function show($filename)
    // {
    //     $disk = Storage::disk('s3');             // config/filesystems.phpのs3を選択
    //     try {                                    //tryの中に // 例外が発生するおそれがあるコードを書く
    //         $contents = $disk->get($filename);   //ファイル名を受け取りS3のファイルを取得して、
    //         $mimeType = $disk->mimeType($filename);  //mimeTypeはlaravel標準のバリデーション
    //     } catch (\Exception $e) {  //catch()で例外検知。引数には(\例外クラス名　例外を受け取る変数名)を記載。laravelには例外クラスにdefaultでExceptionがある
    //         return response(['message' => $e->getMessage()], 404);  //ファイルが存在しない場合は404返す
    //     }
    //     return response($contents)->header('Content-Type', $mimeType);
    // }   //Content-Typeはファイルの種類を示す情報を指定する「項目」、mimetypeはファイルの種類を示す「情報」
    
    
    // // //一覧画面作成、S3直下のファイルを全て取得してviewに渡す
    // // public function index()
    // // {
    // //     $disk = Storage::disk('s3');
    // //     $files = $disk->files('item_pic');   //files()の中はinputのnameで使っている名前を使う
    // //     return view('images.index', ['files' => $files]);
    // // }
    
    
    // //削除処理
    // public function destroy($filename)
    // {
    //     $disk = Storage::disk('s3');
    //     $disk->delete($filename);
    //     return redirect()->action('ImagesController@index');
    // }
}
