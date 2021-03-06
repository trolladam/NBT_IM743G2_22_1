window.onload = function () {
    let form = document.getElementById('upload-image')

    form.addEventListener('submit', function (e) {
        e.preventDefault()

        // e.target is the form that was submitted by the user

        let responseContainer = document.getElementById('upload-response')
        let formData = new FormData(e.target)

        let inputs = document.querySelectorAll(
            'form input, form textarea, form button'
        )
        toggleInputs(inputs)

        axios
            .post(e.target.action, formData)
            .then(function (response) {
                const imageUrl = response.data.image_url
                const message = response.data.message

                let htmlSuccess = `
                    <div>
                        <div class="alert alert-success">${message}</div>
                        <img src="${imageUrl}" alt="" width="150" />
                    </div>
                `

                responseContainer.innerHTML = htmlSuccess
            })
            .catch(function (error) {
                // catch will run when we get back an http error from the server
                // responce code between 400 - 500
                let htmlError = ''
                const errorMessages = error.response.data.errors
                if (errorMessages.length > 0) {
                    htmlError += "<div class='alert alert-error'><ul>"
                    for (let i = 0; i < errorMessages.length; i++) {
                        htmlError += `<li>${errorMessages[i]}</li>`
                    }
                    htmlError += '</ul></div>'

                    responseContainer.innerHTML = htmlError
                }
            })
            .finally(function () {
                toggleInputs(inputs)
            })
    })
}

function toggleInputs(inputs) {
    for (let i = 0; i < inputs.length; i++) {
        inputs[i].disabled = !inputs[i].disabled
    }
}
