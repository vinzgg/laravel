<?php

namespace App\Http\Controllers;

use App\MailList;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Illuminate\Http\Request;
use PDF;

class MailListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.surat.index', ['data' => MailList::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.surat.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        MailList::create([
            'tanggal_masuk' => time(),
            'asal' => $request->asal,
            'no_surat' => $request->no_surat,
            'tingkat_keamanan' => $request->tingkat_keamanan,
            'perihal' => $request->perihal,
        ]);
        return redirect()->route("surat-disposisi.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MailList  $mailList
     * @return \Illuminate\Http\Response
     */
    public function show(MailList $mailList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MailList  $mailList
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mailList = MailList::findOrFail($id);
        //dd($mailList);
        return view("admin.surat.edit", compact('mailList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MailList  $mailList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $mailList = MailList::findOrFail($id);
        $mailList->asal = $request->asal;
        $mailList->tanggal_masuk = $request->tanggal_masuk;
        $mailList->no_surat = $request->no_surat;
        $mailList->tingkat_keamanan = $request->tingkat_keamanan;
        $mailList->perihal = $request->perihal;
        $mailList->save();
        return redirect()->route("surat-disposisi.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MailList  $mailList
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mailList = MailList::findOrFail($id);
        $mailList->delete();
        return redirect()->route("surat-disposisi.index");
    }

    public function print($id)
    {
        $mail = MailList::findOrFail($id);

        $pdf = PDF::loadView('print/pdf', compact('mail'));

        return $pdf->stream('surat-' . time() . '.pdf', array("Attachment" => false));
    }
}
