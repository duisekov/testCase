<template>
    <div class="card-body">
        <h4>День: {{ day }}</h4>
        <div class="card-deck">
            <div class="card card-body" v-for="corral in corrals.data" v-bind:key="corral.id">
                <h6 class="card-title">{{ corral.name }}</h6>
                <sheep :parentData="{corral}"></sheep>
            </div>
        </div>
        <hr>
        <button @click="createCorral()" class="btn btn-primary">Создать новую ферму</button>
        <button @click="updateCorral()" class="btn btn-primary">Обновить</button>
        <button @click="showHistory()" class="btn btn-primary">История</button>
        <button @click="deleteSheep()" class="btn btn-danger float-right">Зарубить овечку</button>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                corrals: [],
                day: 0,
                time: 0,
                interval: null
            };
        },

        mounted() {
            if (localStorage.getItem('corrals')) {
                this.corrals = JSON.parse(localStorage.getItem('corrals'));
                this.day = localStorage.getItem('day');
            } else {
                axios
                    .get('/api/corral?random=1')
                    .then(response => {
                        this.corrals = response.data;
                        localStorage.setItem('corrals', JSON.stringify(this.corrals));
                    });
            }

            this.interval = setInterval(this.incrementTime, 1000);
        },

        methods: {
            async deleteSheep() {
                try {
                    await axios.delete('/api/destroy');
                    let response = await axios.get('/api/corral');
                    this.corrals = response.data;
                    localStorage.setItem('corrals', JSON.stringify(this.corrals));
                } catch (e) {
                    console.err(e)
                }
            },

            updateCorral() {
                window.location.reload();
                localStorage.setItem('day', this.day);
            },

            async incrementTime() {
                this.time = this.time + 1;
                if (this.time % 10 == 0 && this.time % 100 == 0) {
                    this.day = parseInt(this.day) + 1;
                    try {
                        await axios.post('/api/sheep');
                        await axios.delete('/api/destroy')
                        let response = await axios.get('/api/corral');
                        this.corrals = response.data;
                        localStorage.setItem('corrals', JSON.stringify(this.corrals));
                    } catch (e) {
                        console.err(e)
                    }
                } else if (this.time % 10 == 0) {
                    this.day = parseInt(this.day) + 1;
                    try{
                        await axios.post('/api/sheep');
                        let response = await axios.get('/api/corral');
                        this.corrals = response.data;
                        localStorage.setItem('corrals', JSON.stringify(this.corrals));
                    } catch (e) {
                        console.err(e)
                    }
                }
            },

            createCorral() {
                try {
                    localStorage.clear();
                    axios
                        .get('/api/corral?random=1')
                        .then(response => {
                            this.corrals = response.data;
                            localStorage.setItem('corrals', JSON.stringify(this.corrals));
                        });

                    this.day = 0;
                    this.time = 0;
                    this.interval = setInterval(this.incrementTime, 1000);
                } catch (e) {
                    console.err(e)
                }
            },

            showHistory() {
                var win = window.open('/history', '_blank');
                win.focus();
            },
        }
    };
</script>
