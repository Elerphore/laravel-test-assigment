@extends('layout/main-layout')

@section('left-arrow-link', '/')
@section('right-arrow-link', '/update')

@section('form')

<form id="crud-form">
    <div>
        <label for="token">Token</label>
        <input id="token" name="token" type="text">
    </div>

    <button type="submit">Receiver entities</button>
</form>

<div id="entities-block" style="width: 100%;display: none">
    <h1 style="text-align: center">Entities</h1>
    <div id="entities"></div>
</div>

<script type="text/javascript" src="js/dist/json-formatter.umd.js"></script>

<script>
    const form = document.getElementById('crud-form')
    const entitiesBlock = document.getElementById('entities-block')

    form.addEventListener('submit', async function (e) {
        e.preventDefault()

        const response = await fetch('/api/receive', {
            method: 'post',
            headers: {
                "Accept": "application/json",
                "Authorization": "Bearer " + form.token.value
            }
        })
        .then((response) => response.json())

        entitiesBlock.style.display = "block"

        const entities = response.entities

        entities.forEach(item => {
            const formatter = new JSONFormatter(JSON.parse(item.data));
            const node = document.createElement("div")
            node.appendChild(formatter.render())

            entitiesBlock.appendChild(node)
        })
    })
</script>
@endsection
