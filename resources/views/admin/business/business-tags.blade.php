    <h2>Tags</h2>
    <ul>
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
                    <td><form method="post" action="/admin/business/{{$business_id}}/remove-tag/{{$tag->id}}">
                            @csrf                            
                            <input type='submit' value='Remove from Business' />
                            </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>there are no tags connected to this business yet</p>
    @endif

    </ul>
    <h2>Add tags to business</h2>
    <form class='admin-form' method='post' action='/admin/business/{{$business_id}}/tag'>
        @csrf
        <label class='admin-form__label'>Tags
            <input type='text' name='tags' />
        </label>
        <input type='hidden' value='{{$business_id}}' />
        <input type='submit' />
    </form>

