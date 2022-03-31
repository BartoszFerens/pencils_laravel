<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        {{ cart.items }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            cart: {
                items: 3,
            }
        },

        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
