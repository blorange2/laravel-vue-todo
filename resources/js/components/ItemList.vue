<template>
    <div>
        <div v-for="(item, index) in items" :key="index">
            <list-item
                :item="item"
                class="item"
                v-on:itemchanged="$emit('reloadlist')"
            />
        </div>
    </div>
</template>

<script>
import ListItem from "./ListItem.vue";
export default {
    components: { ListItem },
    props: ["items"],
};
</script>

<style></style>
