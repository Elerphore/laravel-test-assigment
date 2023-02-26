@extends('layout/main-layout')

@section('left-arrow-link', '/')
@section('right-arrow-link', '/update')

@section('form')

<form id="crud-form">

    <h1>ENTITIES CRUD</h1>

    <div>
        <label for="token">Token</label>
        <input id="token" name="token" type="text">
    </div>

    <button type="submit">Receiver entities</button>

    <div id="entities-block" style="width: 100%;display: none; align-items: center">
        <h1 style="text-align: center">Entities</h1>
        <div id="entities"></div>
    </div>
</form>

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

        entitiesBlock.style.display = "flex"

        const entities = response.entities

        await onEntityReceiver(entities)
    })

    async function onEntityReceiver(entities) {

        entitiesBlock.innerHTML = "";

        entities.forEach(item => {
            const formatter = new JSONFormatter(JSON.parse(item.data));
            const node = document.createElement("div")
            node.appendChild(formatter.render())

            const deleteFormNode = document.createElement("form")
            const deleteButtonNode = document.createElement("button")

            deleteButtonNode.style.outline = "none"
            deleteButtonNode.style.border = "none"
            deleteButtonNode.style.background = "red"
            deleteButtonNode.innerText = `Delete ${item.id} entity`
            deleteButtonNode.style.padding = "5px 10px"
            deleteButtonNode.style.marginBottom = "15px"
            deleteButtonNode.style.marginTop = "5px"

            deleteFormNode.appendChild(deleteButtonNode)

            entitiesBlock.appendChild(node)
            entitiesBlock.appendChild(deleteFormNode)


            deleteFormNode.addEventListener('submit', async (e) => {
                e.preventDefault()

                const response = await fetch(`/api/delete/${item.id}`, {
                    method: 'post',
                    headers: {
                        "Accept": "application/json",
                        "Authorization": "Bearer " + form.token.value
                    }
                })
                .then(response => response.json())

                const entities = response.entities

                await onEntityReceiver(entities)
            })
        })
    }
</script>
@endsection
