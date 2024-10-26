<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\ItemName;
use App\Models\Location;
use App\Models\ResponsiblePerson;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Supports\AssetStatus;
use App\Supports\Sample;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $assets = Asset::all();

        return view('assets.index', compact('assets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $statuses = AssetStatus::all();
        $people = ResponsiblePerson::all();
        $locations = Location::all();
        $itemNames = ItemName::all();
        return view('assets.create',compact('statuses','people','locations','itemNames'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // กำหนดกฎการตรวจสอบข้อมูล
        $request->validate([
            'item_name_id' => 'required|string|max:255',
            'amount' => 'required|string|max:255',
            'brand_model' => 'required|string|max:255',
            'location_id' => 'required|string|max:255',
            'status' => 'required|string',
            'responsible_person_id' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // อนุญาตให้เป็นภาพเท่านั้น
        ]);

        // สร้างสินทรัพย์ใหม่
        $asset = new Asset($request->only(['item_name_id', 'brand_model','amount', 'location_id', 'status', 'responsible_person_id']));

        // ถ้ามีการอัปโหลดภาพ
        if ($request->hasFile('image')) {
            // อัปโหลดภาพไปยังโฟลเดอร์ที่กำหนด
            $path = $request->file('image')->store('assets/images', 'public');
            $asset->image = $path; // บันทึก path ของภาพในฐานข้อมูล
        }

        // บันทึกสินทรัพย์ในฐานข้อมูล
        $asset->user_id = auth()->user()->id;
        $asset->save();

        // ส่งกลับไปยังหน้ารายการสินทรัพย์พร้อมข้อความแจ้งเตือน
        return redirect()->route('assets.index')->with('success', 'เพิ่มทรัพย์สินเรียบร้อยแล้ว!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Asset $asset)
    {
        return view('assets.show', compact('asset'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Asset $asset)
    {
        $statuses = AssetStatus::all();
        $people = ResponsiblePerson::all();
        $locations = Location::all();
        $itemNames = ItemName::all();

        return view('assets.edit', compact('asset','statuses','people','locations','itemNames'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Asset $asset)
    {
        // dd($request->all());
        $request->validate([
            'item_name_id' => 'required|string|max:255',
            'brand_model' => 'required|string|max:255',
            'location_id' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'responsible_person_id' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);

        // อัปเดตข้อมูลสินทรัพย์
        $asset->item_name_id = $request->item_name_id;
        $asset->brand_model = $request->brand_model;
        $asset->location_id = $request->location_id;
        $asset->status = $request->status;
        $asset->responsible_person_id = $request->responsible_person_id;

        // ถ้ามีการอัปโหลดภาพใหม่
        if ($request->hasFile('image')) {
            // ลบภาพเก่า (ถ้ามี)
            if ($asset->image) {
                Storage::delete($asset->image);
            }

            // อัปโหลดภาพใหม่พร้อมตั้งชื่อไฟล์ด้วย uniqid() และนามสกุลเดิม
        $filename = uniqid() . '.' . $request->file('image')->getClientOriginalExtension();
        $path = $request->file('image')->storeAs('assets/images', $filename, 'public');
        $asset->image = $path;
        }

        // บันทึกการเปลี่ยนแปลง
        $asset->user_id = auth()->user()->id;
        $asset->save();

        return redirect()->route('assets.show', $asset)->with('success', 'ทรัพย์สินได้รับการอัปเดตเรียบร้อยแล้ว!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
