<?php

namespace App\Http\Controllers;

use App\Models\Access;
use App\Models\Jabatan;
use App\Models\JAccess;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class AccessController extends Controller
{
    public function index(Request $request)
    {
        return view("access.index", [
            "user" => Pegawai::where("nik", "=", $request->session()->get("auth.user")->nik)->first()
        ]);
    }

    public function grant(Request $request)
    {
        if ($request->filterBy == "pegawai") {
            $list = Access::where("master", "=", $request->type)->get();
        } else {
            $list = JAccess::where("master", "=", $request->type)->get();
        }

        foreach ($list ?? [] as $l) {
            $l->create = false;
            $l->read = false;
            $l->update = false;
            $l->delete = false;
            $l->save();
        }

        $this->grantCreate($request);
        $this->grantRead($request);
        $this->grantUpdate($request);
        $this->grantDelete($request);

        return redirect()->back()->with("message", "sukses mengatur hak akses");
    }

    function grantCreate($request)
    {
        foreach ($request->create ?? [] as $create) {
            if ($request->filterBy == "pegawai") {
                $l = Access::where([["nik", "=", $create], ["master", "=", $request->type]])->first();
            } else {
                $l = JAccess::where([["jabatan_id", "=", $create], ["master", "=", $request->type]])->first();
            }
            $l->create = true;
            $l->read = true;
            $l->save();
        }
    }

    function grantRead($request)
    {
        foreach ($request->read ?? []  as $read) {
            if ($request->filterBy == "pegawai") {
                $l = Access::where([["nik", "=", $read], ["master", "=", $request->type]])->first();
            } else {
                $l = JAccess::where([["jabatan_id", "=", $read], ["master", "=", $request->type]])->first();
            }
            $l->read = true;
            $l->save();
        }
    }

    function grantUpdate($request)
    {
        foreach ($request->update ?? []  as $update) {
            if ($request->filterBy == "pegawai") {
                $l = Access::where([["nik", "=", $update], ["master", "=", $request->type]])->first();
            } else {
                $l = JAccess::where([["jabatan_id", "=", $update], ["master", "=", $request->type]])->first();
            }
            $l->update = true;
            $l->read = true;
            $l->save();
        }
    }

    function grantDelete($request)
    {
        foreach ($request->delete ?? []  as $delete) {
            if ($request->filterBy == "pegawai") {
                $l = Access::where([["nik", "=", $delete], ["master", "=", $request->type]])->first();
            } else {
                $l = JAccess::where([["jabatan_id", "=", $delete], ["master", "=", $request->type]])->first();
            }
            $l->delete = true;
            $l->read = true;
            $l->save();
        }
    }


    public function filterBy(Request $request)
    {
        if ($request->filterBy == "pegawai") {
            $list = Pegawai::where("nik", "!=", "PAD001")->get();
        } else {
            $list = Jabatan::all();
        }

        switch ($request->type) {
            case "kategori":
                $index = 1;
                break;
            case "pegawai":
                $index = 2;
                break;
            case "gudang":
                $index = 3;
                break;
            case "departemen":
                $index = 4;
                break;
            case "jabatan":
                $index = 5;
                break;
            default:
                $index = 0;
                break;
        }

        // return response()->json($list->access[0]->create);
        return view("access.table", [
            "list" => $list,
            "index" => $index,
            "filterBy" => $request->filterBy
        ])->render();
    }
}
