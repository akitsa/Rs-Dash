@extends('front/layouts/template')

{{-- @section('title')
    <div class="title">
        <div class="container">
            <h3 >Profil Rumah Sakit</h3>
        </div>
    </div>
@endsection

@section('hero')
<div class="hero">
    <div class="container">
        <img style="width: 500px" src="{{asset('front/images/BG.jpg')}}" alt="">
    </div>
</div>
    
@endsection --}}

@section('content')
    <h3>Profil Rumah Sakit</h3>
    
    <img class="img-fluid mx-auto d-block" style="width: 80em" src="{{asset('front/images/profil.jpg')}}" alt="">
    <blockquote class="generic-blockquote">
        <h3 style="text-align:center;"> Pimpinan Rumah Sakit Siti Aisyah Madiun</h3>
    </blockquote>
    <table>
        <tr>
            <td style="width: 150px" >Direktur</td>
            <td style="padding: 25px"  >Dr. Iwan Hartono, M.Kes</td>
        </tr>
        <tr>
            <td style="width: 150px"  >Wakil Direktur Medis</td>
            <td style="padding: 25px" >Dr. Anang Sigit Anoraga</td>
        </tr>
        <tr>
            <td   style="width: 150px;"  > Wakil Direktur Adm dan Keu</td>
            <td  style="padding: 25px"  > Dr. Donna Dwi Yudhawati, MMR  </td>
        </tr>
    </table>
    <div class="row">
        <div class="col-md-6">
            <div class="single-defination">
                <h4 class="mb-20" >Visi</h4>
                <div class="line "></div>
                <p style="font-size: 1rem">Menjadi Rumah Sakit pilihan utama masyarakat Madiun dan  sekitarnya dengan memberikan pelayanan kesehatan yang berfokus pada pasien, Islami serta mengutamakan mutu dan keselamatan pasien. </p>
            </div>
        </div>

        <div class="col-md-6">
            <div class="single-defination">
                <h4 class="mb-20">Misi</h4>
                <div class="line"></div>
             <ol>
                <li> Memberikan Pelayanan kesehatan yang berfokus pada pasien dengan mengutamakan mutu dan keselamatan pasien</li>
                <li> Mengembangkan sumber daya insani sesuai dengan standart profesi, bermutu dan mempunyai komitmen yang tinggi terhadap Rumah Sakit dan Persyarikatan </li>
                <li> Mengembangkan dakwah dan pelayanan yang islami </li>
                <li> Mencipatakan lingkungan kerja yang sehat dan harmonis</li>
             </ol>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="single-defination">
                <h3 style="text-align: center;">Sejarah</h3>
                <div class="line"></div>
                <p></p>
            </div>
        </div>
    </div>
    
      
   
@endsection
    
