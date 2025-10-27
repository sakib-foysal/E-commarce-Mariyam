<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Source;
use App\Models\Setting;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class SourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data['setting'] = Setting::first();
        $query = Source::query();

        if ($request->has('search') && $request->search != '') {
            $query->where('phone_number', 'like', '%' . $request->search . '%');
        }

        if ($request->ajax()) {
            $sources = $query->latest()->take(10)->get();
            return view('sources.partials.list', compact('sources'))->render();
        }

        $sources = $query->latest()->paginate(10);

        return view('sources.index', $data + compact('sources'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['setting'] = Setting::first();
        return view('sources.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'nid' => 'required|string|max:20',
            'description' => 'required|string',
            'address' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('sources', 'public');
        }

        Source::create($data);

        return redirect()->route('sources.index')->with('success', 'Source created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $source = Source::findOrFail($id);
        return view('sources.show', compact('source'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['setting'] = Setting::first();
        $source = Source::findOrFail($id);
        return view('sources.edit', compact('source') + $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $source = Source::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'nid' => 'required|string|max:20',
            'description' => 'required|string',
            'address' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            if ($source->image) {
                Storage::disk('public')->delete($source->image);
            }
            $data['image'] = $request->file('image')->store('sources', 'public');
        }

        $source->update($data);

        return redirect()->route('sources.index')->with('success', 'Source updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $source = Source::findOrFail($id);

        if ($source->image) {
            Storage::disk('public')->delete($source->image);
        }

        $source->delete();

        return redirect()->route('sources.index')->with('success', 'Source deleted successfully.');
    }
}
