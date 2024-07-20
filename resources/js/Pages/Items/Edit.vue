<script setup>
import { reactive } from 'vue'

const props = defineProps({
    item: Object,
})

const form = reactive({
    id: props.item.id,
    name: props.item.name,
    memo: props.item.memo,
    price: props.item.price,
    is_selling: props.item.is_selling,
})

const storeItem = () => {
    Inertia.post('/items', form)
}
</script>

<template>
    <Head title="商品編集" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">商品編集</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <section class="text-gray-600 body-font relative">
                            <form @submit.prevent="storeItem">
                                <div class="container px-5 mx-auto">
                                    <div class="lg:w-1/2 md:w-2/3 mx-auto">
                                        <div class="-m-2">
                                        <div class="p-2 w-full mx-auto">
                                            <div class="relative">
                                            <label for="name" class="leading-7 text-sm text-gray-600">商品名</label>
                                            <input type="text" id="name" name="name" required  v-model="form.name" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                            </div>
                                        </div>
                                        <div class="p-2 w-full mx-auto">
                                            <div class="relative">
                                            <label for="memo" class="leading-7 text-sm text-gray-600">メモ</label>
                                            <textarea type="memo" id="memo" name="memo" required  v-model="form.memo" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"></textarea>
                                            </div>
                                        </div>
                                        <div class="p-2 w-full mx-auto">
                                            <div class="relative">
                                            <label for="price" class="leading-7 text-sm text-gray-600">料金</label>
                                            <input type="number" id="price" name="price" required  v-model="form.price" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"></input>
                                            </div>
                                        </div>
                                        <div class="p-2 w-full mx-auto">
                                            <div class="relative">
                                            <label for="is_selling" class="leading-7 text-sm text-gray-600">ステータス</label>
                                            <input type="radio" id="is_selling" name="is_selling" required  v-model="form.is_selling" value="1"></input>
                                            <label class="ml-2 mr-4">販売中</label>
                                            <input type="radio" id="is_selling" name="is_selling" required  v-model="form.is_selling" value="0"></input>
                                            <label class="ml-2 mr-4">停止中</label>
                                            </div>
                                        </div>
                                        <div class="p-2 w-full mt-4 flex justify-around">
                                            <button type="submit" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">商品登録</button>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
