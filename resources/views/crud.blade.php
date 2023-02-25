@extends('layout/main-layout')
@section('form')

<form id="crud-form">
    <div>
        <label for="token">Token</label>
        <input id="token" name="token" type="text">
    </div>

    <button type="submit">Receiver entities</button>
</form>

<div style="width: 100%;display: none">
    <h1 style="text-align: center">Entities</h1>
    <div id="entities"></div>
</div>

<script type="text/javascript" src="js/dist/json-formatter.umd.js"></script>

<script>
    const form = document.getElementById('crud-form')

    form.addEventListener('submit', function (e) {
        e.preventDefault()

        fetch('/api/create', {
            method: 'post',
            body: JSON.stringify({
                data: form.entity.value
            }),
            headers: {
                "Accept": "application/json",
                "Authorization": "Bearer " + form.token.value
            }
        })
    })

    // const myJSON = {ans: 42, zhopa: ["test", "blabla", "haha"], test: "kekos"};
    //
    // const formatter = new JSONFormatter(myJSON);
    //
    // document.body.appendChild(formatter.render());
</script>
@endsection
