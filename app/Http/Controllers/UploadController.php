<?php
 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
 
use App\Gambar;
 
class UploadController extends Controller
{
	public function upload(){
		$gambar = Gambar::get();
		return view('upload',['gambar' => $gambar]);
		
	}
 
	public function proses_upload(Request $request){
		$this->validate($request, [
			'file' => 'file|image|mimes:jpeg,png,jpg|max:2048',
			'judul' => 'required',
			'berita' => 'required',
		]);
 
		// menyimpan data file yang diupload ke variabel $file

		$file = $request->file('file');
			if($file != NULL){
		$nama_file = time()."_".$file->getClientOriginalName();
 
				  // isi dengan nama folder tempat kemana file diupload
				  
		$tujuan_upload = 'data_file';

		$file->move($tujuan_upload,$nama_file);
			}
			else{
				
				$nama_file='';

			}
		Gambar::create([

			'file' => $nama_file,
			'Judul' => $request->judul,
			'Berita' => $request->berita,
			'jenis'	=> 2,
		
			]);
 
		return redirect()->back();
	}

	public function hapus($id){
		DB::table('gambar')->where('id',$id)->delete();
		return redirect('/upload');


	}

	public function lihat($id){
		
		$gambar =DB::table('gambar')->where('id',$id)->get();
		
	foreach( $gambar as $gambaar)
	 $gambaar->Berita;
	 
		
		return view('berita',['berita' => $gambar]);

}

}