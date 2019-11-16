<template>
    <select multiple class="form-control" name="" id="">
        <option value="" v-for="sheep in parentData.corral.sheeps">{{sheep.name}}</option>
    </select>
</template>

<script>
    export default {
        props: {
            parentData: Object
        }
    };
</script>
