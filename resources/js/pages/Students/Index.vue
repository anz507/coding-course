<script setup>
import { useForm, usePage } from '@inertiajs/vue3';

const pageData = usePage();
const students = pageData.props.students;

const form = useForm({
    id: null,
    nama: '',
    alamat: '',
    kelas_id: '',
    jenis_kelamin: '',
    nama_orang_tua: '',
});

const submit = function() {
    if (form.id) {
        // lakukan update
        form.post('/students/' + form.id);
    } else {
        // lakukan create
        form.post('/students');
    }
}

const update = function(student) {
    form.id = student.id
    form.nama = student.nama
    form.kelas_id = student.kelas_id
    form.alamat = student.alamat
    form.jenis_kelamin = student.jenis_kelamin
    form.nama_orang_tua = student.nama_orang_tua
}

const destroy = function(student) {
    form.delete('/students/' + student.id);
}
</script>

<template>
    <div class="p-16">
        <h1 class="font-bold">Test Student Index</h1>
        <div>
            <form @submit.prevent="submit">
                <pre>{{ form.id }}</pre>
                <div class="flex flex-col">
                    <label>Nama</label>
                    <input class="border" type="text" v-model="form.nama">
                </div>
                <div class="flex flex-col">
                    <label>Alamat</label>
                    <input class="border" type="text" v-model="form.alamat">
                </div>
                <div class="flex flex-col">
                    <label>Kelas ID</label>
                    <input class="border" type="text" v-model="form.kelas_id">
                </div>
                <div class="flex flex-col">
                    <label>Jenis Kelamin</label>
                    <input class="border" type="text" v-model="form.jenis_kelamin">
                </div>
                <div class="flex flex-col">
                    <label>Nama Orang Tua</label>
                    <input class="border" type="text" v-model="form.nama_orang_tua">
                </div>
                <button type="submit" class="border bg-green-500 text-white px-2 py-1 rounded">Simpan</button>
            </form>
        </div>
        <ul>
            <template v-for="student in students">
                <li class="text-xs my-2">
                    {{ student.nama }} ({{ student.alamat }}): {{ student.jenis_kelamin }}
                    <button class="border px-2 py-1 rounded bg-blue-500 text-white" @click="update(student)">Update</button>
                    <button class="border px-2 py-1 rounded bg-red-500 text-white" @click="destroy(student)">Delete</button>
                </li>
            </template>
        </ul>
    </div>
</template>

