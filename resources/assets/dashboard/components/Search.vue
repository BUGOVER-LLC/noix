<!-- @format -->

<template lang="html">
    <v-dialog v-if="isView" v-model="isView" eager no-click-animation>
        <h1>SEARCH</h1>
    </v-dialog>
</template>

<script lang="ts">
import { Component, Vue } from 'vue-property-decorator';

import { AbstractModule } from '@/dashboard/store/modules/AbstractStore';

@Component({
    components: {},
    mixins: [],
})
export default class Search extends Vue {
    get isView() {
        return AbstractModule.searchToggle;
    }
}
</script>

<style lang="scss" scoped></style>
