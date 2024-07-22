<script setup>
import { getToday } from '@/common'
import { onMounted, reactive } from 'vue'

onMounted(() => { // ページ読み込み後即座に実行
    form.date = getToday()
})

const form = reactive({
    data: null,
})
</script>

<template>
    日付<br>
    <input type="date" name="date" v-model="form.date">
</template>