<?php

namespace App\Http\Controllers;

use App\Models\Picture;
use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Intervention\Image\Facades\Image;
use PhpParser\Error;

class TourController extends Controller
{
    public function index(Request $request)
    {
        $tours = Tour::select(['tours.*', 'pictures.picture as picture']);

        if ($request->createdByMe) {
            $tours = $tours->where('tours.user_id', Auth::id());
        }

        $tours = $tours->join('pictures', 'pictures.id', '=', 'tours.picture_id')->get();

        return view('tour.tour-list', ['tours' => $tours]);
    }

    public function create(Request $request)
    {
        return view('tour.new-tour');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'picture' => 'required|image|max:4086',
            'description' => 'required',
            'price' => 'required'
        ]);

        $form_data = array(
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'from' => $request->input('from'),
            'to' => $request->input('to'),
            'price' => $request->input('price'),
            'countOfParticipant' => $request->input('countOfParticipant'),
            'user_id' => Auth::id(),
        );

        $tour = Tour::create($form_data);

        $tempPicture = Image::make($request->file('picture'));
        Response::make($tempPicture->encode('jpeg'));

        $form_data = array(
            'user_id' => Auth::id(),
            'picture' => $tempPicture,
            'name'=> $request->file('picture')->getClientOriginalName(),
            'tour_id' => $tour->id
        );

        $picture = Picture::create($form_data);

        $tour->picture_id = $picture->id;
        $tour->save();

        return redirect()->route('tour-list')->with('message', ['Túra bola úspešne pridaná.']);
    }

    public function show(Request $request)
    {
        $tour = $this->getTour($request->id);
        return view('tour.tour-detail', ['tour' => $tour]);
    }

    public function edit(Request $request)
    {
        $tour = $this->getTour($request->id);
        return view('tour.new-tour', ['tour' => $tour]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required'
        ]);

        $tour = Tour::findOrFail($request->input('id'));

        if ($tour == null) {
            throw new Error('Nenašiel som túru.');
        }

        $tour->name = $request->input('name');
        $tour->description = $request->input('description');
        $tour->from = $request->input('from');
        $tour->to = $request->input('to');
        $tour->price = $request->input('price');
        $tour->countOfParticipant = $request->input('countOfParticipant');

        if ($request->file('picture') != null) {
            Picture::findOrFail($tour->id)->delete();

            $tempPicture = Image::make($request->file('picture'));
            Response::make($tempPicture->encode('jpeg'));

            $form_data = array(
                'user_id' => Auth::id(),
                'picture' => $tempPicture,
                'name'=> $request->file('picture')->getClientOriginalName(),
                'tour_id' => $tour->id
            );

            $picture = Picture::create($form_data);
            $tour->picture_id = $picture->id;
        }

        $tour->save();

        return redirect()->route('tour-list')->with('message', ['Úspešne upravené']);
    }

    public function remove(Request $request)
    {
        $id = $request->input('id');

        Picture::where('tour_id', $id)->delete();
        Tour::where('id', $id)->delete();

        return response()->json(['message' => 'Túra úspešne vymazaná.']);
    }

    private function getTour($id)
    {
        return Tour::select(['tours.*', 'pictures.picture as picture'])
            ->join('pictures', 'pictures.id', '=', 'tours.picture_id')
            ->where('tours.id', '=', $id)
            ->first();
    }
}
