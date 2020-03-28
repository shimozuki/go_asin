<div class="slider">
    <div class="container">
        <div id="sliderfoto" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                @foreach ($foto as $item)
                    <li data-target="#sliderfoto" data-slide-to="{{$item->foto_kamar}}" class="{{ $loop->first ? 'active' : '' }}"></li>
                @endforeach
            </ol>
    
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                @foreach ($foto as $item)
                    <div class="item {{ $loop->first ? 'active' : '' }}">
                        <img src="{{asset('foto_kamar/'. $item->foto_kamar)}}">
                    </div>
                @endforeach
            </div>
    
            <!-- Left and right controls -->
            <a class="left carousel-control" href="#sliderfoto" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#sliderfoto" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>

<style>
    .slider {
        padding: 1%;
    }
    .carousel-inner {
        max-height: 450px;
        background-size: cover;
        background-attachment: fixed;
        background-repeat: no-repeat;
        background-position: center; 
    }
</style>