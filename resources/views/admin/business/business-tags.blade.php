    <h2>Tags</h2>
    <ul>
    @foreach($tags as $tag)
        <li>{{$tag->name}}</li>
    @endforeach
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

