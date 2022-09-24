<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\models\User;
use App\models\Madrasah;
use App\models\Console;

class ConsoleController extends Controller
{
    public function dashboard(){
        $console = Console::find(1);

        return view("console.dashboard",['console'=>$console]);
    }

    public function manageaccount(){
        $console = Console::find(1);

        return view("console.manageaccount",['console'=>$console]);
    }

    public function manageaccount_save(Request $request){
        $validated = $request->validate([
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required|string|max:255',
            'password' => 'required|confirmed|min:8',
        ]);

        $user = User::where("email",$request->get('email'))->get();

        // Save the file locally in the storage/public/ folder under a new folder named /user
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $picName = $file->getClientOriginalName();
            $imagePath = '/public/user/'.$user[0]->id;
            $photo = '/storage/user/'.$user[0]->id.'/'.$picName;
            $request->file('photo')->storeAs($imagePath, $picName);
        }

        if(count($user) != 0){
            $user[0]->name = $request->get('name');
            $user[0]->password = bcrypt($request->get('password'));
            if ($request->hasFile('photo')) {
                $user[0]->photo = $photo;
            }
            $user[0]->save();
    
            $notification = array(
                'message' => 'Data account has been changed',
                'alert-type' => 'success'
            );
        }else{
            $notification = array(
                'message' => 'Account not found',
                'alert-type' => 'success'
            );
        }

        return redirect()->route('console.manageaccount')->with($notification);
    }

    public function madrasah(){
        $madrasah = Madrasah::all();
        $console = Console::find(1);

        return view("console.madrasah",["console"=>$console,"madrasah"=>$madrasah]);
    }

    public function madrasah_new(){
        $console = Console::find(1);

        return view("console.madrasah_new",["console"=>$console]);
    }

    public function madrasah_edit($id){
        $madrasah = Madrasah::find($id);
        $console = Console::find(1);

        return view("console.madrasah_edit",["console"=>$console,"madrasah"=>$madrasah]);
    }

    public function madrasah_delete($id){
        $madrasah = Madrasah::find($id);

        $madrasah->delete();

        $notification = array(
            'message' => 'Madrasah has been deleted',
            'alert-type' => 'success'
        );

        return redirect()->route('console.madrasah')->with($notification);
    }

    public function madrasah_save(Request $request){
        $validated = $request->validate([
            'nama_madrasah' => 'required|string|max:255',
            'jenis_madrasah' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'akreditasi' => 'required|string|max:255',
            'npsn' => 'required|string|max:255',
            'latitude' => 'required|string|max:255',
            'longitude' => 'required|string|max:255',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $madrasah = new Madrasah;

        // Save the file locally in the storage/public/ folder under a new folder named /user
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $picName = $file->getClientOriginalName();
            $imagePath = '/public/madrasah';
            $photo = '/storage/madrasah/'.$picName;
            $request->file('photo')->storeAs($imagePath, $picName);
            $madrasah->photo = $photo;
        }

        $madrasah->nama_madrasah = $request->get('nama_madrasah');
        $madrasah->jenis_madrasah = $request->get('jenis_madrasah');
        $madrasah->alamat = $request->get('alamat');
        $madrasah->akreditasi = $request->get('akreditasi');
        $madrasah->npsn = $request->get('npsn');
        $madrasah->latitude = $request->get('latitude');
        $madrasah->longitude = $request->get('longitude');
        $madrasah->save();

        $notification = array(
            'message' => 'Madrasah has been added',
            'alert-type' => 'success'
        );

        return redirect()->route('console.madrasah')->with($notification);
    }

    public function madrasah_edit_save(Request $request, $id){
        $validated = $request->validate([
            'nama_madrasah' => 'required|string|max:255',
            'jenis_madrasah' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'akreditasi' => 'required|string|max:255',
            'npsn' => 'required|string|max:255',
            'latitude' => 'required|string|max:255',
            'longitude' => 'required|string|max:255',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $madrasah = Madrasah::find($id);

        // Save the file locally in the storage/public/ folder under a new folder named /user
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $picName = $file->getClientOriginalName();
            $imagePath = '/public/madrasah';
            $photo = '/storage/madrasah/'.$picName;
            $request->file('photo')->storeAs($imagePath, $picName);
            $madrasah->photo = $photo;
        }

        $madrasah->nama_madrasah = $request->get('nama_madrasah');
        $madrasah->jenis_madrasah = $request->get('jenis_madrasah');
        $madrasah->alamat = $request->get('alamat');
        $madrasah->akreditasi = $request->get('akreditasi');
        $madrasah->npsn = $request->get('npsn');
        $madrasah->latitude = $request->get('latitude');
        $madrasah->longitude = $request->get('longitude');
        $madrasah->save();

        $notification = array(
            'message' => 'Madrasah has been changed',
            'alert-type' => 'success'
        );

        return redirect()->route('console.madrasah')->with($notification);
    }

    public function setting_console(){
        $console = Console::find(1);

        return view('console.setting_console',['console'=>$console]);
    }

    public function setting_console_save(Request $request){
        $validated = $request->validate([
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'required|string|max:255',
        ]);

        $console = Console::find(1);

        // Save the file locally in the storage/public/ folder under a new folder named /user
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $picName = $file->getClientOriginalName();
            $imagePath = '/public/logo';
            $logo = '/storage/logo/'.$picName;
            $request->file('logo')->storeAs($imagePath, $picName);
        }

        $console->title = $request->get('title');
        if ($request->hasFile('logo')) {
            $console->logo = $logo;
        }
        $console->save();

        $notification = array(
            'message' => 'Setting console has been changed',
            'alert-type' => 'success'
        );

        return redirect()->route('console.setting_console')->with($notification);
    }
}