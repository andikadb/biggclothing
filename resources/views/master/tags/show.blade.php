@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Tag {{ $tag->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('master/tags/' . $tag->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Tag"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['master/tags', $tag->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Tag',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $tag->id }}</td>
                                    </tr>
                                    <tr>
                                        <th> Name </th>
                                        <td> {{ $tag->name }} </td>
                                    </tr>
                                    <tr>
                                        <th> Description </th>
                                        <td> {{ $tag->description }} </td>
                                    </tr>
                                    <tr>
                                        <th> Created </th>
                                        <td> {{ $tag->created_at}} </td>
                                    </tr>
                                    <tr>
                                        <th> Modified </th>
                                        <td> {{ $tag->modified_at }} </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection