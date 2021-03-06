<?php

namespace App\Http\Controllers\Admin;

use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use App\Item;
use Storage;
use Carbon\carbon;
use App\ImagesHistory;
use App\Http\Controllers\Controller;
use App\Admin;
use \InterventionImage;
use App\ItemPhoto;

class ImagesController extends Controller
{
    //念のためadminのuserだけしか使えなくするをもう一度書いておく
    // public function __construct()
    // {
    //     $this->middleware('auth:admin');
    // }
 
    
    
    
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
        return view('admin/images/list', ['items' => $items, 'cond_title' => $cond_title]);
    }
    
    
    
    public function add()
    {
        return view('admin/images/create');
    }
    
    //もしitems->item_nameと$form->item_nameが同じ名前でなければ
        
            // if(isset($form['image_path'])) {  //issetは変数に値がセットされているか確認する方法、つまり$formに'image_path'があるか確認している
            //     $files = $request->file('image_path');//file('読み込みたいカラム名') 
            //     $path = $files->store('public/image');//store()は引数内のディレクトリに一意のファイル名として保存そこへのパスを返します。
            //     $item->image_path = basename($path); //basenameはパスではなく最後のハッシュ化されたファイル名だけを取得する
                
            //     //写真のリサイズ
            //     InterventionImage::make($files)->resize(100, 100)->save(public_path()."/image/resize_image/". $item->image_path);
            //     //public_pathはpublicディレクトリの完全パスを返す、さらにディレクトリの指定を行う事もできる
            // } else {
            //     $item->image_path = null;  //modelの方で'image_path'が空でも表示できるようにしている
            // }
    
    
    public function create(Request $request)
    {
        $this->validate($request, Item::$rules);  //Itemモデルでバリデーションした（item_name,explanation,amount,inventory_control,item_pic_path)
        // $this->validate($request, ItemPhoto::$rules);
        $form = $request->all(); //$request->all()は全入力を連想配列で取得
        
        $item = new Item(); //新規Itemインスタンス作成
        
        // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
        // フォームから送信されてきたimageを削除する
        unset($form['image_path']);
        // データベースに保存する
        $item->fill($form)->save(); //先にitemのレコードがないと子であるitem_photosは入れられない
        
        $item_photos = array(); //空の配列用意
            for($i=1; $i<=4; $i++){ 
            $file_name = "image_path".$i; //images_path1～4を準備して$file_nameに代入
                  if(isset($request->$file_name)){ //issetは変数に値がセットされているか確認する方法、つまり$file_nameに'image_path'があるか確認している
                      $files = $request->file($file_name); //file('読み込みたい変数、カラムなど文字列ならok') 
                      $path = $request->$file_name->store('public/image'); //画像をストレージに保存
                      $item->image_path = basename($path);
                      $item_photo = new ItemPhoto(); //ItemPhotoインスタンス作成
                      $item_photo->fill(["image_path"=>$file_name]);
                      $item_photos[] = $item_photo; //各item_photoを用意した$item_photosに代入する
                      InterventionImage::make($files)->resize(100, 100)->save(public_path()."/image/resize_image/". $item_photo->image_path);
                  }
            }
        if (!empty($item_photos))
        {
            $item->photos()->saveMany($item_photos);//photos()の所は親(Itemモデル)のphotos()アクションでリレーションしているためphotos()を使う
        }
        return redirect('admin/images/create')->with('flash_message', '商品を追加しました');
    }
    
    
    
    public function edit(Request $request)
    {
        //Itemモデルからデータを取得する
        $item = Item::find($request->id);
        // $image_path = $request->filegetClientOriginalName();
        if(empty($item)) {
            abort(404);
        }
        return view('admin/images/edit', ['item_form' => $item]);
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
        
        return redirect('admin/images/list');
    }
    
    
    public function delete(Request $request)
    {
        //該当するItem modelを取得
        $item = Item::find($request->id);
        //削除する
        $item->delete();
        return redirect('admin/images/list');
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
    //     } catch (\Exception $e) {  //catch()で例外検知。���数には(\例外クラス名　例外を受け取る変数名)を記載。laravelには例外クラスにdefaultでExceptionがある
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
