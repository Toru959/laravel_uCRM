<div class="p-2 w-full mx-auto">
    <div class="relative">
    <label for="kana" class="leading-7 text-sm text-gray-600">顧客名カナ</label>
    <input type="text" id="kana" name="kana" required  v-model="form.kana" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"></input>
    </div>
</div>
<div class="p-2 w-full mx-auto">
    <div class="relative">
    <label for="tel" class="leading-7 text-sm text-gray-600">電話番号</label>
    <input type="tel" id="tel" name="tel" required  v-model="form.tel" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"></input>
    </div>
</div>
<div class="p-2 w-full mx-auto">
    <div class="relative">
    <label for="email" class="leading-7 text-sm text-gray-600">メールアドレス</label>
    <input type="email" id="email" name="email" required  v-model="form.email" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"></input>
    </div>
</div>
<div class="p-2 w-full mx-auto">
    <div class="relative">
    <label for="postcode" class="leading-7 text-sm text-gray-600">郵便番号</label>
    <input type="number" id="postcode" name="postcode" required  v-model="form.postcode" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"></input>
    </div>
</div>
<div class="p-2 w-full mx-auto">
    <div class="relative">
    <label for="address" class="leading-7 text-sm text-gray-600">住所</label>
    <input type="text" id="address" name="address"required  v-model="form.address" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"></input>
    </div>
</div>
<div class="p-2 w-full mx-auto">
    <div class="relative">
    <label for="birthday" class="leading-7 text-sm text-gray-600">誕生日</label>
    <input type="date" id="birthday" name="birthday" v-model="form.birthday" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"></input>
    </div>
</div>
<div class="p-2 w-full mx-auto">
    <div class="relative">
    <label class="leading-7 text-sm text-gray-600 mr-4">性別</label>
    <input type="radio" id="gender0" name="gender"  v-model="form.gender" value="0"></input>
    <label for="gender0" class="ml-2 mr-4">男性</label>
    <input type="radio" id="gender1" name="gender"   v-model="form.gender" value="1"></input>
    <label for="gender1" class="ml-2 mr-4">女性</label>
    <input type="radio" id="gender2" name="gender"  v-model="form.gender" value="2"></input>
    <label for="gender2" class="ml-2 mr-4">その他</label>
    </div>
</div>
<div class="p-2 w-full mx-auto">
    <div class="relative">
    <label for="memo" class="leading-7 text-sm text-gray-600">メモ</label>
    <textarea type="memo" id="memo" name="memo" v-model="form.memo" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"></textarea>
    </div>
</div>