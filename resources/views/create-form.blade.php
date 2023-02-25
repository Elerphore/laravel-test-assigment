@extends('layout/main-layout')

@section('left-arrow-link', '/update')
@section('right-arrow-link', '/crud')

@section('form')
<form id="create-form">
    <div>
        <label for="token">Token</label>
        <input id="token" name="token" type="text">
    </div>

    <div>
        <label for="entity">Entity to save</label>
        <input id="entity" name="entity" type="text">
    </div>

    <button type="submit">Save</button>

    <div
        style="
            display: none;
            margin-top: 20px;
            background: #23A0DB;
            border-radius: 5px;
            text-align: center;
            color: white;
            font-size: 16pt;
            padding: 10px 20px;
        "
        id="result-block">

    </div>

</form>

<script>
    const form = document.getElementById('create-form')
    const resultNode = document.getElementById('result-block')

    form.addEventListener('submit',  async (e) => {
        e.preventDefault()

        console.warn(form.entity.value)

        const response = await fetch('/api/create', {
            method: 'post',
            body: JSON.stringify({
                data: JSON.parse(form.entity.value)
            }),
            headers: {
                "Accept": "application/json",
                "Authorization": "Bearer " + form.token.value
            }
        })
        .then(response => response.json())

        resultNode.style.display = "block"
        resultNode.innerText = JSON.stringify(response)

    })

</script>
@endsection
