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
    <AppLayout>
        <div class="p-4">
            <div class="p-6 rounded bg-amber-50 border border-amber-100">
                <h1 class="font-bold">Student Form</h1>
                <div>
                    <form @submit.prevent="submit">
                        <div class="flex flex-col my-2">
                            <label>Nama</label>
                            <input class="border px-2 py-1 bg-white rounded-sm" type="text" v-model="form.nama">
                        </div>
                        <div class="flex flex-col my-2">
                            <label>Alamat</label>
                            <input class="border px-2 py-1 bg-white rounded-sm" type="text" v-model="form.alamat">
                        </div>
                        <div class="flex flex-col my-2">
                            <label>Kelas ID</label>
                            <input class="border px-2 py-1 bg-white rounded-sm" type="text" v-model="form.kelas_id">
                        </div>
                        <div class="flex flex-col my-2">
                            <label>Jenis Kelamin</label>
                            <input class="border px-2 py-1 bg-white rounded-sm" type="text" v-model="form.jenis_kelamin">
                        </div>
                        <div class="flex flex-col my-2">
                            <label>Nama Orang Tua</label>
                            <input class="border px-2 py-1 bg-white rounded-sm" type="text" v-model="form.nama_orang_tua">
                        </div>
                        <button type="submit" class="border bg-green-500 text-white px-2 py-1 rounded">Simpan</button>
                    </form>
                </div>
            </div>
            <div class="text-lg font-bold mt-6">Student List</div>
            <ul>
                <template v-for="student in students">
                    <li class="text-xs my-2 py-2 border-b flex justify-between items-center">
                        <span>{{ student.nama }} ({{ student.alamat }}): {{ student.jenis_kelamin }}</span>
                        <div>
                            <button class="w-16 border px-2 py-1 rounded bg-blue-500 text-white" @click="update(student)">Update</button>
                            <button class="w-16 border px-2 py-1 rounded bg-red-500 text-white" @click="destroy(student)">Delete</button>
                        </div>
                    </li>
                </template>
            </ul>
        </div>
    </AppLayout>
</template>

