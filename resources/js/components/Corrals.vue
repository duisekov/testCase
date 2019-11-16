<template>
    <div class="card">
        <div class="card-header">
            Фермочка для овечек
        </div>
        <div class="card-body">
            <div class="card-deck">
                <div class="card card-body" v-for="corral in corrals.data" v-bind:key="corral.id">
                    <h6 class="card-title">{{ corral.name }}</h6>
                    <sheep :parentData="{corral}"></sheep>
                </div>
            </div>
            <button></button>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                corrals: []
            };
        },
        mounted() {
            if (localStorage.getItem('corrals')) {
                this.corrals = JSON.parse(localStorage.getItem('corrals'));
            } else {
                axios
                    .get('/api/corral')
                    .then(response => {
                        this.corrals = response.data;
                        localStorage.setItem('corrals', JSON.stringify(this.corrals));
                    });
            }
        }
    };
</script>
