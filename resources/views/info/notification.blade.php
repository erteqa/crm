<li id="{{$not["id"]}}" class="noti" >
    <a href="{{route('Index.Note',['id'=>$not["id"]])}}" target="_blank">
        <span class="icon black"><i class="fa {{$not["icon"]}} fa-fw"></i></span>
        <span>{!! $not["data"] !!}</span>
        <span   class="pull-right text-muted small">{{now()->diffForHumans() }}</span>
    </a>
    <span class="btn btn-link"  onclick="deletnote('{{$not["id"]}}',event)"><i   class="fa fa-trash  fa-fw"></i> </span>
    <span class="btn btn-link"   onclick="makeread('{{$not["id"]}}',event)"><i   class="fa fa-envelope-o  fa-fw"></i> </span>
    {{--<i   class="fa fa-trash  fa-fw"> <a href="javascript:deletnote($this.id)" id="{{$not["id"]}}" ></a></i>--}}
    {{--<div id="{{$not["id"]}}" onclick="deletnote($this.id)"> <i    class="fa fa-trash  fa-fw"></i></div>--}}
</li>
<li class="divider"></li>