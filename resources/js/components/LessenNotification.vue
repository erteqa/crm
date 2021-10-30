<template>
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="fa fa-bell fa-fw"></i><span v-if="lesson" style="color: white"  class="btn btn-danger btn-circle" id='GFG_Span'>{{count(auth()->user()->unreadNotifications)}}</span>@endif <i class="fa fa-caret-down"></i>
        </a>
        <ul  class=" dropdown-menu scrollable-menu  dropdown-alerts " role="menu">

            <li :id="lesson.id" >
                <a href="{{route('Index.Note',['id'=>$not->id])}}">
                    <span class="icon black"><i class="fa {{$not->data['icon']}} fa-fw"></i></span>
                    <span>{!! $not->data['data'] !!}</span>
                    <span   class="pull-right text-muted small">{{$not['created_at']->diffForHumans() }}</span>
                </a>
                <span class="btn btn-link"  onclick="deletnote('{{$not->id}}',event)"><i   class="fa fa-trash  fa-fw"></i> </span>
                <span class="btn btn-link"   onclick="makeread('{{$not->id}}',event)"><i   class="fa {{!is_null($not->read_at)?'fa-envelope-o':'fa-envelope'}} fa-envelope-o  fa-fw"></i> </span>

            </li>
            <li class="divider"></li>


        </ul>
        <!-- /.dropdown-alerts -->
    </li>
</template>

<script>
    export default {
        props:['notification'],
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
