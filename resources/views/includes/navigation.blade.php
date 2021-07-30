@php
    $c = $data->currentPage();
    $r = $data->lastPage();
    $lastPage = $data->lastPage();
    $l = 1;
    if ($lastPage > 9) {
        if ($c > 5) {
            if ($c + 5 < $r) {
                $l = ($c-4);
                $r = ($c + 4);
            } else {
                $l = $r-9;
            }
        } elseif ($r > 9) {
            $r = 9;
        }
    }

    // check if data need sort
    $sort = "";
    $sortOrder = false; 

    if (isset($_GET['insc'])) {
        $sort .= '&insc=' . $_GET['insc'];
        $sortOrder = true;
    } elseif (isset($_GET['desc'])) {
        $sort .= '&desc=' . $_GET['desc'];
        $sortOrder = true;
    }

    if ($sortOrder) {
        if (isset($_GET['usern'])) {
            $sort .= '&usern=' . $_GET['usern'];
        } elseif (isset($_GET['rol'])) {
            $sort .= '&rol=' . $_GET['rol'];
        } elseif (isset($_GET['mail'])) {
            $sort .= '&mail=' . $_GET['mail'];
        } elseif (isset($_GET['bookname'])) {
            $sort .= '&bookname=' . $_GET['bookname'];
        } elseif (isset($_GET['borrower'])) {
            $sort .= '&borrower=' . $_GET['borrower'];
        } elseif (isset($_GET['quantityx'])) {
            $sort .= '&quantityx=' . $_GET['quantityx'];
        } elseif (isset($_GET['brdate'])) {
            $sort .= '&brdate=' . $_GET['brdate'];
        } elseif (isset($_GET['redate'])) {
            $sort .= '&redate=' . $_GET['redate'];
        } elseif (isset($_GET['dc'])) {
            $sort .= '&dc=' . $_GET['dc'];
        } elseif (isset($_GET['bn'])) {
            $sort .= '&bn=' . $_GET['bn'];
        } elseif (isset($_GET['au'])) {
            $sort .= '&au=' . $_GET['au'];
        } elseif (isset($_GET['ge'])) {
            $sort .= '&ge=' . $_GET['ge'];
        } elseif (isset($_GET['pub'])) {
            $sort .= '&pub=' . $_GET['pub'];
        } elseif (isset($_GET['trans'])) {
            $sort .= '&trans=' . $_GET['trans'];
        } elseif (isset($_GET['coun'])) {
            $sort .= '&coun=' . $_GET['coun'];
        } elseif (isset($_GET['qua'])) {
            $sort .= '&qua=' . $_GET['qua'];
        } elseif (isset($_GET['pri'])) {
            $sort .= '&pri=' . $_GET['pri'];
        } elseif (isset($_GET['bd'])) {
            $sort .= '&bd=' . $_GET['bd'];
        } elseif (isset($_GET['rd'])) {
            $sort .= '&rd=' . $_GET['rd'];
        }
    }
@endphp

<nav class="navigation pagination text-center">
    <h2 class="screen-reader-text">Posts navigation</h2>
    <div class="nav-links">
        @if($c > 1)
            <a class="page-numbers" href="{{ $data->url(1).$sort }}"><i class="fa fa-angle-double-left"></i></a>
            <a class="page-numbers" href="{{ $data->url($c-1).$sort }}"><i class="fa fa-arrow-left"></i></a>
        @endif
        @for($i = $l; $i <= $r; $i++)
            @if($i != $c)
                <a class="page-numbers" href="{{ $data->url($i).$sort }}">{{ $i }}</a>
            @else
                <span class="page-numbers current">{{ $i }}</span>
            @endif
        @endfor
        @if($c < $r)
            <a class="page-numbers" href="{{ $data->url($c+1).$sort }}"><i class="fa fa-arrow-right"></i></a>
            <a class="page-numbers" href="{{ $data->url($lastPage).$sort }}"><i class="fa fa-angle-double-right"></i></a>
        @endif
    </div>
</nav>