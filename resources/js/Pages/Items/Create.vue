<script setup>
import { reactive, onMounted, ref, computed } from 'vue'
import { Inertia } from '@inertiajs/inertia'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import ValidationErrors from '@/Components/ValidationErrors.vue';
import { getToday } from '@/common'

const props = defineProps({
    customers: Array,
    items: Array,
    errors: Object
});

const itemList = ref([]);
const quantity = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];

const form = reactive({
    date: null,
    customer_id: null,
    status: null,
    items: [],
    memo: '',
    price: 0,
});

onMounted(() => {
    form.date = getToday();
    props.items.forEach(item => {
        itemList.value.push({
            id: item.id,
            name: item.name,
            price: item.price,
            quantity: 0
        });
    });
});

const totalPrice = computed(() => {
    let total = 0;
    itemList.value.forEach(item => {
        total += item.price * item.quantity;
    });
    return total;
});

const storePurchase = () => {
    form.items = itemList.value.filter(item => item.quantity > 0).map(item => ({
        id: item.id,
        quantity: item.quantity
    }));
    Inertia.post(route('purchase.store'), form);
};
</script>

<template>
    <Head title="購入画面" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">購入画面</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <section class="text-gray-600 body-font relative">
                            <form @submit.prevent="storePurchase">
                                <div class="container px-5 mx-auto">
                                    <div class="lg:w-1/2 md:w-2/3 mx-auto">
                                        <div class="-m-2">
                                            <div class="p-2 w-full mx-auto">
                                                <div class="relative">
                                                    <label for="date" class="leading-7 text-sm text-gray-600">日付</label>
                                                    <input type="date" id="date" name="date" required v-model="form.date" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                                </div>
                                            </div>
                                            <div class="p-2 w-full mx-auto">
                                                <div class="relative">
                                                    <label for="customer" class="leading-7 text-sm text-gray-600">会員名</label>
                                                    <select name="customer" required v-model="form.customer_id" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                                        <option v-for="customer in customers" :value="customer.id" :key="customer.id">
                                                            {{ customer.id }} : {{ customer.name }}
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="p-2 w-full mx-auto">
                                                <div class="relative">
                                                    <label for="memo" class="leading-7 text-sm text-gray-600">メモ</label>
                                                    <textarea id="memo" name="memo" v-model="form.memo" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"></textarea>
                                                </div>
                                            </div>
                                            <div class="p-2 w-full mx-auto">
                                                <div class="relative">
                                                    <label for="price" class="leading-7 text-sm text-gray-600">料金</label>
                                                    <input type="number" id="price" name="price" v-model="form.price" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                                </div>
                                            </div>
                                            <div class="p-2 w-full mx-auto">
                                                <div class="relative">
                                                    <label for="items" class="leading-7 text-sm text-gray-600">商品</label>
                                                    <table>
                                                        <thead>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>商品名</th>
                                                                <th>金額</th>
                                                                <th>数量</th>
                                                                <th>小計</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr v-for="item in itemList" :key="item.id">
                                                                <td>{{ item.id }}</td>
                                                                <td>{{ item.name }}</td>
                                                                <td>{{ item.price }}</td>
                                                                <td>
                                                                    <select v-model.number="item.quantity">
                                                                        <option v-for="q in quantity" :value="q" :key="q">{{ q }}</option>
                                                                    </select>
                                                                </td>
                                                                <td>{{ item.price * item.quantity }}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="p-2 w-full mt-4 flex justify-around">
                                                <button type="submit" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">商品登録</button>
                                            </div>
                                            <div class="p-2 w-full mx-auto">
                                                <div class="relative">
                                                    <label class="leading-7 text-sm text-gray-600">合計金額</label>
                                                    <div>{{ totalPrice }}円</div>
                                                </div>
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