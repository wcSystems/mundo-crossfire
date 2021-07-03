@extends('app')
@section('css')
<style>
    
    iframe{
            width: 100%;
            height: 300px;
        }
    @media (min-width:782px) {
        iframe{
            width: 60%;
            height: 100%;
        }
        #primary{
            margin-top:4% !important;
            margin-bottom: 4% !important
        }
    }
</style>
@endsection
@section('content')
    <div class="ast-container" style="max-width:100%;padding:0 !important">
        <div id="primary"  class="content-area primary " >
            <div  class="video" style="text-align:center;display: flex;align-items: center;height:55vh" >
                <iframe style="margin:auto" src="https://www.youtube.com/embed/XIGBLve0FOY" title="Mundo Crossfire" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"></iframe>
            </div>
        </div>
    </div>
@endsection
@section('js')
@endsection
