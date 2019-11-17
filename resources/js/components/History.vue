<template>
    <div class="card-body">
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Description</th>
                <th scope="col">Time</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="history in histories.data" v-bind:key="history.id">
                <th scope="row">{{ history.id }}</th>
                <td>{{ history.description }}</td>
                <td>{{ history.created_at }}</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                histories: []
            };
        },

        mounted() {
            axios.get('/api/history').then(response => {
                this.histories = response.data
            });
        }
    }
</script>
