@extends('app')
@section('meta')
    <meta name="description" content="Productos para mascotas directo a tu hogar, delivery con conciencia, retiramos lo que reciclas, fomentando la economía circular.">
    <!-- Google / Search Engine Tags -->
    <meta itemprop="name" content="Suscripcion - Mundo Crossfire">
    <meta itemprop="description" content="Productos para mascotas directo a tu hogar, delivery con conciencia, retiramos lo que reciclas, fomentando la economía circular.">
    <meta itemprop="image" content="{{asset('storage/meta/iso.png')}}">
    <!-- Facebook Meta Tags -->
    <meta property="og:url" content="www.mundo-crossfire.com.ve">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Suscripcion - Mundo Crossfire">
    <meta property="og:description" content="Productos para mascotas directo a tu hogar, delivery con conciencia, retiramos lo que reciclas, fomentando la economía circular.">
    <meta property="og:image" content="{{asset('storage/meta/iso.png')}}">
    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Suscripcion - Mundo Crossfire">
    <meta name="twitter:description" content="Productos para mascotas directo a tu hogar, delivery con conciencia, retiramos lo que reciclas, fomentando la economía circular.">
    <meta name="twitter:image" content="{{asset('storage/meta/iso.png')}}">
    
@endsection
@section('css')
<style>
#content {
    background-color: transparent !important; background-image: linear-gradient(60deg,#ffffff 0%, #f8f6f3 100%) !important;
}

    .select2-selection__rendered{
        color: var(--global-primary) !important;
        background: #fff;
        
        margin: 0  !important;
        margin-left: 15px !important
    }
    .select2-container--default.select2-container--focus .select2-selection--multiple{
        border: solid var(--global-primary) 1px !important
    }
    .select2-selection__choice{
        background-color: #fff !important
    }
    .select2-container--default .select2-selection--multiple.select2-selection--clearable{
        padding-right: 0px !important
    }




    .kit-individual-all:hover{
        box-shadow: 0px 0px 10px 3px var(--global-primary) !important;
        color: var(--global-primary) !important
    }
    .kit-individual{
        box-shadow: 0px 0px 10px 3px var(--global-primary) !important;
        color: var(--global-primary) !important
    }

    .color-green{
        color: var(--global-primary) !important;
    }

    .size-desktop{
        width: 40%;
    }
    .elementor-4427 .elementor-element.elementor-element-5031d75 {
        padding: 0px;
    }

    .textMovil{
           display: none !important;
       }
       .textNoMovil{
           display: inline-flex !important;
       }
       .spaceMovil{
           margin-bottom: 0px !important
       }
       .spaceTopSec{
           margin-top: -20px !important
       }
   

       .select {
  position: relative;
  border: 1px solid var(--global-primary);
  
  width: 120px;
  overflow: hidden;
  background-color: #fff;
}


.box-desktop-s1{
    width: 40% !important;
}
.box-desktop-s2{
    width: 50% !important;
    margin: auto;
    padding-right: 5px
}
.box-desktop-s3{
    width: 30% !important
}
.box-desktop-sm{
    display: none
}

#imgSliderSusc{
    width: 500px !important;
}




    @media (min-width: 1230px){
        .elementor-4427 .elementor-element.elementor-element-5031d75 {
            padding: 0px 50px;
        }
    }
    @media (max-width:767px) {
        .height-mobil {
            margin: 5px !important
        }
        .size-desktop{
            width: 100%;
        }
    }

    

    @media (max-width:410px) {
        #ckeck-changeTimeSuscribe-01,
        #ckeck-changeTimeSuscribe-02,
        #ckeck-changeTimeSuscribe-03,
        #ckeck-changePlanSuscribe-1,
        #ckeck-changePlanSuscribe-2{
            display: none !important}
    }

        #versionDesktop{
            display: block;
        }
        #versionMovil{
            display: none;
        }
   
    @media (max-width:1260px) {
        #imgSliderSusc{
            width: 380px !important;
        }
    }
    @media (max-width:1155px) {
        .box-desktop-s2{
            font-size: 13px
        }
    }
    @media (max-width:1024px) {
        .elementor-slides .swiper-slide-inner{
            padding: 0px !important
        }
        #main {
            background-color: #fff !important;
        }
        .margin26{
            margin-top: -26px !important
        }
        .elementor-4427 .elementor-element.elementor-element-3634f3d {
            padding: 0px;
        }
        .sizeLayout{
            text-align: center !important
        }
       .textMovil{
           display: inline-flex !important;
       }
       .spaceMovil{
           margin-bottom: 10px !important
       }
       .spaceTopSec{
           margin-top: 0px !important
       }
       .textNoMovil{
           display: none !important;
       }

       .box-desktop-s1 {
            display: none
        }
       .box-desktop-sm {
           display: inline;
            width: 100% !important;
        }
       .box-desktop-s3 {
            width: 50% !important;
            padding: 10px !important
        }
        #caja03Padding{
            padding: 0px 5px !important
        }
        #imgSliderSusc{
            max-width: 350px !important;
        }
        .selectDiv{
            width: 100% !important;
        }
        .select{
            width: 100% !important;
            margin-top: 2px !important;
            margin-bottom: 10px !important
        }
        .elementor-column-gap-default>.elementor-row>.elementor-column>.elementor-element-populated{
            padding: 0px !important
        }
    }
    
    #nameTimesPlan,
    #nameTimesPlan > p,
    #nameDescriptionPlan,
    #nameDescriptionPlan > p{
        margin-bottom: 0px !important;
        display: contents;
        font-size: 12px !important
    }


  
.select:before {
    content: '';
    position: absolute;
    left: 5px;
    top: 15px;
    width: 0;
    height: 0;
    border-style: solid;
    border-width: 7px 5px 0 5px;
    border-color: var(--global-primary) transparent transparent transparent;
    z-index: 5;
    pointer-events: none;
}
  
.select select {
    border: none;
    box-shadow: none;
    background-color: transparent;
    background-image: none;
    appearance: none;
    color: var(--global-primary) !important;
    padding: 5px;
    width: 100%;
    text-align-last: center;
}




.box-movil-s1{
    width: 50% !important;
}
.box-movil-s2{
    width: 50% !important
}
.box-movil-s3{
    width: 100% !important
}



/* #kit-individual-M{
    font-size: 10px !important;
    content: 'hola' !important
} */
</style>
@endsection
@section('content')
    <div class="ast-container">
        <div id="primary" class="content-area primary">
            <main id="main" class="site-main" >
                <article class="post-4427 page type-page status-publish ast-article-single" id="post-4427" itemtype="https://schema.org/CreativeWork" itemscope="itemscope">
                    <header class="entry-header ast-header-without-markup"></header><!-- .entry-header -->
                    <div class="entry-content clear" itemprop="text">
                        <div class="elementor elementor-4427">
                            <div class="elementor-inner">
                                <div class="elementor-section-wrap">
                                    <section style="padding-bottom: 20px;background: none !important" class="elementor-section elementor-top-section elementor-element elementor-element-a584ef8 elementor-section-content-middle elementor-reverse-mobile elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="a584ef8" data-element_type="section">
                                        {{-- <div class="elementor-background-overlay"></div> --}}
                                        @if(isset($comuna_t->comunas))
                                        <div class="elementor-element elementor-element-a238012 elementor-widget elementor-widget-heading" data-id="a238012" data-element_type="widget" data-widget_type="heading.default">
                                            <div class="elementor-widget-container">
                                                <p style="text-align:center;line-height: normal;" class="elementor-heading-title elementor-size-default">
                                                    
                                                        <?php echo $comuna_t->comunas; ?>
                                                    
                                                </p>
                                            </div>
                                        </div>
                                    @endif
                                        <div class="elementor-container elementor-column-gap-default" style="background: #fff !important">
                                            
                                            <div class="elementor-row">
                                                <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-b7bcb4e"  data-id="b7bcb4e" data-element_type="column">
                                                    <div class="elementor-column-wrap elementor-element-populated">
                                                        <div class="elementor-widget-wrap">
                                                            <section id="versionDesktop" style="background-color: transparent !important;" class="box-expand-pd elementor-section elementor-top-section elementor-element elementor-element-3634f3d elementor-section-boxed elementor-section-height-default elementor-section-height-default"  data-id="3634f3d"  data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                                                <div class="elementor-container elementor-column-gap-default" style="max-width: 100% !important">
                                                                    <div class="elementor-row" style="justify-content: center;" >
                                                                        <div style="text-align:center !important" class="box-desktop-s1 elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-10836f8"  data-id="10836f8"   data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                                                            <div style="display: table;margin:0px !important" class="height-block elementor-column-wrap elementor-element-populated">
                                                                                <div style="display: table-cell; vertical-align: middle;"  class="elementor-widget-wrap">
                                                                                    <div  class="elementor-element elementor-element-dd47011 elementor-widget elementor-widget-text-editor" data-id="dd47011" data-element_type="widget"  data-widget_type="text-editor.default">
                                                                                        <div class="elementor-widget-container">
                                                                                            <div class="elementor-text-editor elementor-clearfix">

                                                                                                <p style="text-align:center;line-height: normal;margin-bottom:0px" class="textNoMovil elementor-heading-title elementor-size-default">
                                                                                                    {{--  --}}
                                                                                                </p><br />
                                                                                                <p style="text-align:center;line-height: normal;font-size:14px;margin-bottom:0px !important" class="textNoMovil elementor-heading-title elementor-size-default">
                                                                                                    {{-- Estas  solo estan disponibles al momento de la suscripción --}}
                                                                                                </p>

                                                                                                <div id="imgSliderSusc" style="margin: 10px auto;width:600px"  class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-b7bcb4e"  data-id="b7bcb4e">
                                                                                                    <div class="elementor-column-wrap elementor-element-populated">
                                                                                                        <div class="elementor-widget-wrap">
                                                                                                            <div class="elementor-element elementor-element-0e80b58 elementor--h-position-center elementor--v-position-middle elementor-arrows-position-inside elementor-pagination-position-inside elementor-widget elementor-widget-slides"
                                                                                                                data-id="0e80b58" data-element_type="widget"
                                                                                                                data-settings="{&quot;navigation&quot;:&quot;both&quot;,&quot;autoplay&quot;:&quot;yes&quot;,&quot;pause_on_hover&quot;:&quot;yes&quot;,&quot;pause_on_interaction&quot;:&quot;yes&quot;,&quot;autoplay_speed&quot;:5000,&quot;infinite&quot;:&quot;yes&quot;,&quot;transition&quot;:&quot;slide&quot;,&quot;transition_speed&quot;:500}"
                                                                                                                data-widget_type="slides.default">
                                                                                                                <div class="elementor-widget-container">
                                                                                                                    <div class="elementor-swiper">
                                                                                                                        <div class="elementor-slides-wrapper elementor-main-swiper swiper-container" dir="ltr" data-animation="fadeInUp">
                                                                                                                            <div class="swiper-wrapper elementor-slides">
                                                                                                                                @foreach ($kits as $item)
                                                                                                                                <div class="elementor-repeater-item-84bbb56 swiper-slide">
                                                                                                                                    <div style="background-color: #833CA300; background-size: contain;width: 100%;background-repeat: no-repeat;height: 300px;background-position: center;margin: auto;background-image:url({{$item->img_kit}})" >
                                                                                                                                    </div>
                                                                                                                                    <div class="swiper-slide-inner">
                                                                                                                                        <div class="swiper-slide-contents">
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                @endforeach
                                                                                                                            </div>
                                                                                                                            <div class="swiper-pagination">
                                                                                                                            </div>
                                                                                                                            <div
                                                                                                                                class="elementor-swiper-button elementor-swiper-button-prev">
                                                                                                                                <i class="fas fa-chevron-left"
                                                                                                                                    aria-hidden="true"></i>
                                                                                                                                <span
                                                                                                                                    class="elementor-screen-only">Previous</span>
                                                                                                                            </div>
                                                                                                                            <div
                                                                                                                                class="elementor-swiper-button elementor-swiper-button-next">
                                                                                                                                <i class="fas fa-chevron-right"
                                                                                                                                    aria-hidden="true"></i>
                                                                                                                                <span
                                                                                                                                    class="elementor-screen-only">Next</span>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div style="text-align:center !important" class="box-desktop-s2 elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-a2e95a1"  data-id="a2e95a1"  data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                                                            <div style="display: table;margin:0px !important"  class=" height-block elementor-column-wrap elementor-element-populated">
                                                                                <div style="display: table-cell; vertical-align: middle;" class="elementor-widget-wrap">
                                                                                    <div  class="elementor-element elementor-element-dd47011 elementor-widget elementor-widget-text-editor" data-id="dd47011" data-element_type="widget"  data-widget_type="text-editor.default">
                                                                                        <div class="elementor-widget-container">
                                                                                            <div class="elementor-text-editor elementor-clearfix">
                                                                                                <div style="width: 100%;text-align: left;" class="selectDiv">
                                                                                                    <div class="spaceMovil">
                                                                                                        <div style="display: inline-flex !important;width:40px;height:40px;border-radius:50%;background-color:var(--global-primary);color:#fff;display: flex;align-items: center;justify-content: center;">
                                                                                                            1
                                                                                                        </div>
                                                                                                        &nbsp
                                                                                                        <div class="textNoMovil" style="display: inline-flex">
                                                                                                            Selecciona el período a entrenar
                                                                                                        </div>
                                                                                                        <div class="textMovil" style="display: inline-flex">
                                                                                                            Período
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="textNoMovil" style="margin-top: 0px">
                                                                                                        <div style="display: inline-flex !important;width:40px;height:20px;border-radius:50%;display: flex;align-items: center;justify-content: center;">
                                                                                                            <hr style="border:none; border-left: 1px solid var(--global-primary);height:100%;width: 1px;  ">
                                                                                                        </div>
                                                                                                        &nbsp
                                                                                                        <div  style="display: inline-flex">
                                                                                                            Período
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div style="margin-top: -7px;" class="margin26">
                                                                                                        <div class="textNoMovil" style="display: inline-flex;width:40px;height:40px;border-radius:50%;display: flex;align-items: center;justify-content: center;">
                                                                                                            <hr style="border:none; border-left: 1px solid var(--global-primary);height:100%;width: 1px;  ">
                                                                                                        </div>
                                                                                                        &nbsp
                                                                                                        <div class="selectDiv" style="display: inline-flex !important">
                                                                                                            <div class="select"  style="display: inline-flex !important;width:180px">
                                                                                                                <select name="" onchange="changeTimeSuscribe()" id="timeSuscribe">
                                                                                                                    <option value="1 Mes">1 Mes</option>
                                                                                                                    <option value="3 Meses">3 Meses</option>
                                                                                                                    <option value="12 Meses">12 Meses</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="textNoMovil" style="margin-top: -20px;margin-bottom: -20px;width: 100%;text-align: left;">
                                                                                                    <div style="display: inline-flex !important;width:40px;height:40px;border-radius:50%;display: flex;align-items: center;justify-content: center;">
                                                                                                        <hr style="border:none; border-left: 1px solid var(--global-primary);height:100%;width: 1px;  ">
                                                                                                    </div>
                                                                                                    &nbsp
                                                                                                    <div style="display: inline-flex !important">
                                                                                                        &nbsp
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="spaceTopSec selectDiv" style="width: 100%;text-align: left;">
                                                                                                    <div class="spaceMovil">
                                                                                                        <div style="display: inline-flex !important;width:40px;height:40px;border-radius:50%;background-color:var(--global-primary);color:#fff;display: flex;align-items: center;justify-content: center;">
                                                                                                            2
                                                                                                        </div>
                                                                                                        &nbsp
                                                                                                        <div class="textNoMovil" style="display: inline-flex">
                                                                                                            Seleccione la modalidad que mas se adapte
                                                                                                        </div>
                                                                                                        <div class="textMovil" style="display: inline-flex">
                                                                                                            Modalidad
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="textNoMovil" style="margin-top: 0px">
                                                                                                        <div style="display: inline-flex !important;width:40px;height:20px;border-radius:50%;display: flex;align-items: center;justify-content: center;">
                                                                                                            <hr style="border:none; border-left: 1px solid var(--global-primary);height:100%;width: 1px;  ">
                                                                                                        </div>
                                                                                                        &nbsp
                                                                                                        <div style="display: inline-flex">
                                                                                                            Modalidad
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div style="margin-top: -7px;" class="margin26">
                                                                                                        <div class="textNoMovil" style="display: inline-flex;width:40px;height:40px;border-radius:50%;display: flex;align-items: center;justify-content: center;">
                                                                                                            <hr style="border:none; border-left: 1px solid var(--global-primary);height:100%;width: 1px;  ">
                                                                                                        </div>
                                                                                                        &nbsp
                                                                                                        <div class="selectDiv" style="display: inline-flex !important">
                                                                                                            <div class="select"  style="display: inline-flex !important;width:180px">
                                                                                                                <select name="" onchange="changePlanSuscribe()" id="plan-suscribe">
                                                                                                                    @foreach ($packages as $item)
                                                                                                                        <option value="{{ $item }}"> <?php echo $item->descripcion_paquete ?> </option>
                                                                                                                    @endforeach
                                                                                                                </select>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="textNoMovil " style="margin-top: -20px;margin-bottom: -20px;width: 100%;text-align: left;">
                                                                                                    <div style="display: inline-flex !important;width:40px;height:40px;border-radius:50%;display: flex;align-items: center;justify-content: center;">
                                                                                                        <hr style="border:none; border-left: 1px solid var(--global-primary);height:100%;width: 1px;  ">
                                                                                                    </div>
                                                                                                    &nbsp
                                                                                                    <div style="display: inline-flex !important">
                                                                                                        &nbsp
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="spaceTopSec  selectDiv" style="width: 100%;text-align: left;">
                                                                                                    <div class="spaceMovil">
                                                                                                        <div style="display: inline-flex !important;width:40px;height:40px;border-radius:50%;background-color:var(--global-primary);color:#fff;display: flex;align-items: center;justify-content: center;">
                                                                                                            3
                                                                                                        </div>
                                                                                                        &nbsp
                                                                                                        <div class="textNoMovil" style="display: inline-flex">
                                                                                                            Entrenamientos personalizados (Opcional)
                                                                                                        </div>
                                                                                                        <div class="textMovil" style="cursor:pointer;display: inline-flex">
                                                                                                            Exclusividad
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="textNoMovil" style="margin-top: 0px">
                                                                                                        <div class="textNoMovil" style="display: inline-flex !important;width:40px;height:0px;border-radius:50%;display: flex;align-items: center;justify-content: center;">
                                                                                                            
                                                                                                        </div>
                                                                                                        &nbsp
                                                                                                        <div  style="cursor:pointer;display: inline-flex;margin-top: -20px;">
                                                                                                            Exclusividad
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div id="html-kits" style="margin-top: -7px;"></div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div style="text-align:center !important;border: 1px solid #D1D1D1;padding: 40px 20px;background-color:#fff" class="box-desktop-s3  elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-c286143"  data-id="c286143"  data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                                                            <div style="display: table;margin:0px !important;padding:0px !important" class="height-block elementor-column-wrap elementor-element-populated">
                                                                                <div style="display: table-cell; vertical-align: middle;"  class="elementor-widget-wrap">
                                                                                    <div  class="elementor-element elementor-element-dd47011 elementor-widget elementor-widget-text-editor" data-id="dd47011" data-element_type="widget"  data-widget_type="text-editor.default">
                                                                                        <div class="elementor-widget-container">
                                                                                            <div class="elementor-text-editor elementor-clearfix">
                                                                                                <div id="caja03Padding" >
                                                                                                    <div>
                                                                                                        <div id="nameGlobalPlan" style="margin-bottom: 0px"></div>
                                                                                                        <p style="margin-bottom: 0px"><span id="nameTimesPlan"></span> <span id="nameDescriptionPlan"></span></p>
                                                                                                        <p id="pricePlan" style="margin-bottom: 0.6em;"></p>
                                                                                                    </div>
                                                                                                    <div>
                                                                                                        <p style="margin-bottom: 0px">Total Exclusividad</p>
                                                                                                        <p id="kitsTotal" style="margin-bottom: 0.6em;"></p>
                                                                                                    </div>
                                                                                                    <div>
                                                                                                        <p style="margin-bottom: 0px;font-weight:bold">Total a Pagar</p>
                                                                                                        <p  id="totalglobal" style="font-weight:bold;margin-bottom: 0.6em;"></p>
                                                                                                    </div>
                                                                                                    <div style="font-size: 12px !important">
                                                                                                        <p  >
                                                                                                            @if(isset($cuotas->cuotas))
                                                                                                                <?php echo $cuotas->cuotas; ?>
                                                                                                            @endif
                                                                                                        </p>
                                                                                                    </div>
                                                                                                    <div class="elementor-element elementor-element-6eab4b7 elementor-align-center elementor-mobile-align-center elementor-tablet-align-center elementor-widget elementor-widget-button" data-id="6eab4b7" data-element_type="widget"  data-widget_type="button.default">
                                                                                                        <div class="elementor-widget-container">
                                                                                                            <div class="elementor-button-wrapper">
                                                                                                                <form action="{{route('subscribe-form')}}" method="GET">
                                                                                                                    @csrf
                                                                                                                    <button  onclick="sendData()"   class="elementor-button-link elementor-button elementor-size-md" role="button">
                                                                                                                        <span class="elementor-button-content-wrapper">
                                                                                                                            <span class="elementor-button-icon elementor-align-icon-left"> </span>
                                                                                                                            <span class="elementor-button-text">Suscribirme</span>
                                                                                                                        </span>
                                                                                                                    </button>
                                                                                                                </form>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div style="text-align:center !important" class="box-desktop-sm elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-10836f8"  data-id="10836f8"   data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                                                            <div style="display: table;margin:0px !important" class="height-block elementor-column-wrap elementor-element-populated">
                                                                                <div style="display: table-cell; vertical-align: middle;"  class="elementor-widget-wrap">
                                                                                    <div  class="elementor-element elementor-element-dd47011 elementor-widget elementor-widget-text-editor" data-id="dd47011" data-element_type="widget"  data-widget_type="text-editor.default">
                                                                                        <div class="elementor-widget-container">
                                                                                            <div class="elementor-text-editor elementor-clearfix">
                                                                                                <p style="text-align:center;line-height: normal;margin-bottom:0px" class="textNoMovil elementor-heading-title elementor-size-default">
                                                                                                   {{--   --}}
                                                                                                </p>
                                                                                                <p style="text-align:center;line-height: normal;font-size:14px" class="textNoMovil elementor-heading-title elementor-size-default">
                                                                                                    {{-- Estas  solo estan disponibles al momento de la suscripción --}}
                                                                                                </p>
                                                                                                <div id="imgSliderSusc" style="margin: 10px auto;width:600px"  class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-b7bcb4e"  data-id="b7bcb4e">
                                                                                                    <div class="elementor-column-wrap elementor-element-populated">
                                                                                                        <div class="elementor-widget-wrap">
                                                                                                            <div class="elementor-element elementor-element-0e80b58 elementor--h-position-center elementor--v-position-middle elementor-arrows-position-inside elementor-pagination-position-inside elementor-widget elementor-widget-slides"
                                                                                                                data-id="0e80b58" data-element_type="widget"
                                                                                                                data-settings="{&quot;navigation&quot;:&quot;both&quot;,&quot;autoplay&quot;:&quot;yes&quot;,&quot;pause_on_hover&quot;:&quot;yes&quot;,&quot;pause_on_interaction&quot;:&quot;yes&quot;,&quot;autoplay_speed&quot;:5000,&quot;infinite&quot;:&quot;yes&quot;,&quot;transition&quot;:&quot;slide&quot;,&quot;transition_speed&quot;:500}"
                                                                                                                data-widget_type="slides.default">
                                                                                                                <div class="elementor-widget-container">
                                                                                                                    <div class="elementor-swiper">
                                                                                                                        <div class="elementor-slides-wrapper elementor-main-swiper swiper-container" dir="ltr" data-animation="fadeInUp">
                                                                                                                            <div class="swiper-wrapper elementor-slides">
                                                                                                                                @foreach ($kits as $item)
                                                                                                                                <div class="elementor-repeater-item-84bbb56 swiper-slide">
                                                                                                                                    <div style="background-color: #833CA300; background-size: contain;width: 100%;background-repeat: no-repeat;height: 300px;background-position: center;margin: auto;background-image:url({{$item->img_kit}})" >
                                                                                                                                    </div>
                                                                                                                                    <div class="swiper-slide-inner">
                                                                                                                                        <div class="swiper-slide-contents">
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                @endforeach
                                                                                                                            </div>
                                                                                                                            <div class="swiper-pagination">
                                                                                                                            </div>
                                                                                                                            <div
                                                                                                                                class="elementor-swiper-button elementor-swiper-button-prev">
                                                                                                                                <i class="fas fa-chevron-left"
                                                                                                                                    aria-hidden="true"></i>
                                                                                                                                <span
                                                                                                                                    class="elementor-screen-only">Previous</span>
                                                                                                                            </div>
                                                                                                                            <div
                                                                                                                                class="elementor-swiper-button elementor-swiper-button-next">
                                                                                                                                <i class="fas fa-chevron-right"
                                                                                                                                    aria-hidden="true"></i>
                                                                                                                                <span
                                                                                                                                    class="elementor-screen-only">Next</span>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </section>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            </main>
        </div>
    </div>
@endsection
@section('js')
<script>
    let statePlanSuscribeTime = 1
    let idGlobalPlan = 1
    let nameGlobalPlan = 'plan 15'
    let nameDescriptionPlan = '2 Visitas al mes'
    let nameTimesPlan = '1 Mes'
    let imgPlanGlobal = ''
    let planComplete = {time:'', price:'', kits:0, paquete_id: 0,paqueteName: '', kit_id: 0, kitsTotal:[]}
    let kit_blade = ( {!! $kits !!} ) ?  {!! $kits !!} : []
    let kit_blade_select = ( {!! $kits !!} ) ?  {!! $kits !!}.map((i) => (i.text = i.nombre_kit)) : []

    function ofertasForeach() {
        let html = ``; 
            html+=`<div class="textNoMovil" style="margin-left:6px">
                        <div class="textNoMovil" style="display: inline-flex;width:40px;height:40px;border-radius:50%;display: flex;align-items: center;justify-content: center;"></div>
                        &nbsp
                        <div class="" style="display: inline-flex !important">
                            <div class="select"  style="display: inline-flex !important;width:180px  ">
                                <select onchange="changeKitSuscribe('desktop')" name=""   class="" id="kit-individual-D">
                                    <option value="0" id="placeholderExt-D" disabled selected>Sin Seleccion</option>`;
                                    kit_blade.forEach(element => {
                                        html += `<option id="op-${ element.id }" value="${ element.id }"> ${ element.nombre_kit } - ${ formatCurrency(element.precio) }%+ </option>`;
                                    });
                        html+=`</select>
                            </div>
                        </div>
                    </div>`;
            html+=`<div class="textMovil selectDiv" style="margin-top: -7px">
                        <div class="textNoMovil" style="display: inline-flex;width:40px;height:40px;border-radius:50%;display: flex;align-items: center;justify-content: center;"></div>
                        &nbsp
                        <div class="selectDiv" style="display: inline-flex !important">
                            <div class="select"  style="display: inline-flex !important;width:180px  ">
                                <select multiple onchange="changeKitSuscribe('mobile')" name=""   id="kit-individual-M">
                                    <option value="0" id="placeholderExt-M" disabled selected hidden>Sin Seleccion</option>
                                    <option value="" id="placeholderExt-M" disabled style="text-align:center" >Puedes agregar mas de 1 Item</option>`;
                                    kit_blade.forEach(element => {
                                        html += `<option id="op-${ element.id }" value="${ element.id }"> ${ element.nombre_kit } - ${ formatCurrency(element.precio) }%+ </option>`;
                                    });
                        html+=`</select>
                            </div>
                        </div>
                    </div>`;
        $('#html-kits').empty().append(html)
    }
    function changeTimeSuscribe(){
        let req = $('#timeSuscribe').val()
        let total = ( planComplete.kits ) ? planComplete.price + planComplete.kits : planComplete.price
        switch (req) {
            case '1 Mes':
                statePlanSuscribeTime = 1
                total = ( planComplete.kits ) ? planComplete.price + planComplete.kits : planComplete.price
                break;
            case '3 Meses':
                statePlanSuscribeTime = 3
                total = ( planComplete.kits ) ? planComplete.price + planComplete.kits : planComplete.price
                break;
            case '12 Meses':
                statePlanSuscribeTime = 12
                total = ( planComplete.kits ) ? planComplete.price + planComplete.kits : planComplete.price
                break;
            default:
                statePlanSuscribeTime = 1
                total = ( planComplete.kits ) ? planComplete.price + planComplete.kits : planComplete.price
                break;
        }
        changePlanSuscribe(idGlobalPlan, nameGlobalPlan)
        displayGlobal()
    }
    function changePlanSuscribe(){
        let req = JSON.parse($('#plan-suscribe').val()).id
        let obj = JSON.parse($('#plan-suscribe').val())
        imgPlanGlobal = obj.img_paquete
        idGlobalPlan = req
        planComplete.time = parseInt(statePlanSuscribeTime)
        planComplete.paquete_id = parseInt(req)
        planComplete.paqueteName = (obj.nombre_paquete) ? obj.nombre_paquete : obj
        nameGlobalPlan = (obj.nombre_paquete) ? obj.nombre_paquete : obj
        planComplete.price = formatPackageReturn(statePlanSuscribeTime,req)
        total = ( planComplete.kits ) ? planComplete.price + planComplete.kits : planComplete.price
        localStorage.setItem("plan_suscribe", JSON.stringify( planComplete ))
        displayGlobal()
    }
    function changeKitSuscribe(option) {
        
        let objGlobal = ''
        let objGlobalStable = $('#kit-individual-M').val()
        let total = 0
        switch (option) {
            case 'mobile':
                
                
                
                objGlobal = $('#kit-individual-M').val()


                objGlobal.forEach((element, index) => {
                    objGlobal[index] = kit_blade.find( i => ( i.id === JSON.parse(element) )) 
                });

                planComplete.kitsTotal = objGlobal

                if((planComplete.kitsTotal).length >= 1 ){
                    if(planComplete.kitsTotal.length === 1){
                        $('#placeholderExt-M').text(`${planComplete.kitsTotal.length} Item`)
                    }else{
                        $('#placeholderExt-M').text(`${planComplete.kitsTotal.length} Items`)
                    }
                }else{
                    $('#placeholderExt-M').text(`Sin Seleccion`)
                }
                $('#kit-individual-M').val(0)

                
                planComplete.kits = objGlobal.reduce((sum, item) => ( sum + item.precio ), 0);
                planComplete.kit_id = parseInt((objGlobal[0]) ? objGlobal[0].id : 1)
                total = ( planComplete.price ) ? planComplete.price + planComplete.kits : planComplete.kits
                displayGlobal()
                break;
            case 'desktop':
                objGlobal =  ($('#kit-individual-D').val()) ? JSON.parse($('#kit-individual-D').val()) : 0
                let NewDataArr = kit_blade.find( i => ( i.id === objGlobal ));
                let validatData = planComplete.kitsTotal.find( i => ( i.id === objGlobal ));

                if(validatData){
                    planComplete.kitsTotal.splice(planComplete.kitsTotal.findIndex( i => ( i.id === objGlobal )),1)
                    $(`#op-${objGlobal}`).css('background','#fff');
                    $(`#op-${objGlobal}`).css('color','#000');
                }else{
                    planComplete.kitsTotal.push(NewDataArr)
                    $(`#op-${objGlobal}`).css('background','var(--global-primary)');
                    $(`#op-${objGlobal}`).css('color','#fff');
                }
                
                if(planComplete.kitsTotal.length >= 1 ){
                    if(planComplete.kitsTotal.length === 1){
                        $('#placeholderExt-D').text(`${planComplete.kitsTotal.length} Item`)
                    }else{
                        $('#placeholderExt-D').text(`${planComplete.kitsTotal.length} Items`)
                    }
                }else{
                    $('#placeholderExt-D').text(`Sin Seleccion`)
                }
                $('#kit-individual-D').val(0)
                
                
                planComplete.kits = (planComplete.kitsTotal).reduce((sum, item) => ( sum + item.precio ), 0);
                planComplete.kit_id = objGlobal
                total = ( planComplete.price ) ? planComplete.price + planComplete.kits : planComplete.kits
                displayGlobal()
                break;
        }












    }
    function formatCurrency (number) {
        return new Intl.NumberFormat('de-DE', {
            currency: 'USD',
            minimumFractionDigits: 0,
        }).format(number);
    }
    function sendData() {
        localStorage.setItem("plan_suscribe", JSON.stringify( planComplete ))
    }
    function formatPackageReturn(statePlanSuscribeTime,req) {
        let package = {!! $packages !!}.find( i => i.id === req )
        switch (statePlanSuscribeTime) {
            case 1:
                return package.precio_3
                break;
            case 3:
                return package.precio_6
                break;
            case 12:
                return package.precio_12
                break;
        }
    }
    function displayGlobal() {
        //console.log('todoObj',planComplete)
        
            $('#nameGlobalPlan').empty().append(`<img style="margin: auto;width: 60px;height: 60px;border-radius: 50%" src="${imgPlanGlobal}">`)
        
        
        $('#nameDescriptionPlan').empty().append(JSON.parse($('#plan-suscribe').val()).descripcion_paquete)
        $('#nameTimesPlan').empty().append($('#timeSuscribe').val())
        $('#pricePlan').empty().append(`$ ${formatCurrency(planComplete.price)}`)
        $('#kitsTotal').empty().append(`${formatCurrency(planComplete.kits)}%+`)
        $('#totalglobal').empty().append(`$ ${formatCurrency( ((planComplete.price/100)*planComplete.kits) + planComplete.price )}`)
    }
    changeTimeSuscribe()
    ofertasForeach()
</script>
@endsection
