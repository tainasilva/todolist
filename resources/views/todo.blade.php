@extends('app')

@section('content')

<div class="container">
    <div class="row">
        <div class="todolist not-done col-md-6">
            <h1>TODO</h1>
            @include('common.errors')
            <form action="/todo" method="POST" class="form-horizontal">
                {{ csrf_field() }}

                <input type="text" name="name" id="task-name" placeholder="Add TODO"  class="form-control" value="{{ old('todo') }}">
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-btn fa-plus"></i>Add
                </button>
            </form>

            @if(count($todo) > 0)
            <ul id="sortable" class="list-unstyled done-items " >
                @foreach ($todo as $todos)
                <li class="ui-state-default" >
                    <div class="checkbox " >
                        <form action="/todo/{{ $todos->id }}" method="POST" style="float: left">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            @if ($todos->status)
                            <label data-todo-id='{{ $todos->id }}'>
                                <input type="checkbox" onchange="this.form.submit()" checked />
                                <span style="text-decoration: line-through;">
                                    {{ $todos->name }}
                                </span>
                            </label>
                            @else
                            <label data-todo-id='{{ $todos->id }}'>
                                <input type="checkbox" onchange="this.form.submit()" />
                                <span>
                                    {{ $todos->name }}
                                </span>
                            </label>
                            @endif
                        </form>
                        <form action="/todo/{{ $todos->id }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                            <button type="submit" class="remove-item btn btn-default btn-xs pull-right">
                                <span class="glyphicon glyphicon-remove"></span>

                            </button>
                        </form>

                    </div>
                </li>
                @endforeach
            </ul>
            @endif

        </div>
    </div>
</div>    
@endsection
