@extends('admin.layout')

@section('main')

    <h2>Editing Tag Group: {{$tagGroup->name}}</h2>

    <form method="post" action="/admin/tag-groups/{{$tagGroup->id}}">
    @csrf

    <x-admin-input name="name" :model="$tagGroup" />
    <x-admin-input name="slug" :model="$tagGroup" />
    <x-admin-input name="description"  type="textarea" :model="$tagGroup" />
    
    <input type='submit' value='Update Tag Group' />

    </form>

    <h2>Tags in group</h2>
    @if(count($tags))
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Remove</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tags as $tag)
                <tr>
                    <td>{{$tag->name}}</td>
                    <td><form method="post" action="/admin/tag-groups/{{$tagGroup->id}}/remove/{{$tag->id}}">
                            @csrf                            
                            <input type='submit' value='Remove from Group' />
                            </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>there are no tags in this group yet</p>
    @endif
    <h2>Add tags to group</h2>
    <form method="post" action="/admin/tag-groups/{{$tagGroup->id}}/add">
    @csrf

    <x-admin-input name="tags" />
    
    <input type='submit' value='Add Tags' />

    </form>

@endsection
