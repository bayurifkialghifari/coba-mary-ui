<script data-navigate-once="true">
    document.addEventListener('livewire:navigated', () => {
        document.body.setAttribute("data-scroll-x", window.scrollX)
    })
    document.addEventListener('livewire:initialized', () => {
        // Confirmation dialog
        Livewire.on('confirm', params => {
            modalConfirmation.showModal()
            document.getElementById('modalConfirmationTitle').innerText = params.title ?? 'Are you sure?'
            document.getElementById('modalConfirmationText').innerText = params.message ?? 'This action cannot be undone.'
            document.getElementById('modalConfirmationButton').addEventListener('click', () => {
                Livewire.dispatch(params.function, {id: params.id})
                modalConfirmation.close()
            })
        })

        Livewire.on('setValueById', params => {
            setTimeout(() => {
                document.getElementById(params.id).value = params.value
            }, 500);
        })
    })
</script>
