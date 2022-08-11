<table>
    <thead>
        <tr>
            <th> Nama </th>
            <th> Alamat </th>
            <th> umur </th>
            <th> Nama KK </th>
            <th> Tensi (mmHg)</th>
            <th> Nadi (denyut/menit)</th>
            <th> Colesterol (mg/dL)</th>
            <th> Suhu (celcius)</th>
            <th> Auris Utro </th>
            <th> Gula Dalam Darah (mg/dL) </th>
            <th> SO2 </th>
            <th> Lain-Lain </th>
            <th> Tgl Pembuatan </th>
        </tr>
    </thead>
    <tbody>
        @php
            $no = 1;
            $total = 0;
        @endphp
        @foreach ($forms as $form)
        <tr>
            <td>{{$form->nama}}</td>
            <td>{{$form->alamat}}</td>
            <td>{{$form->umur}}</td>
            <td>{{$form->nama_kk}}</td>
            <td>{{$form->sistolik}}/{{$form->diastolik}}</td>
            <td>{{$form->nadi}}</td>
            <td>{{$form->chol}}</td>
            <td>{{$form->suhu}}</td>
            <td>{{$form->au}}</td>
            <td>{{$form->gds}}</td>
            <td>{{$form->so2}}</td>
            <td>{{$form->lain_lain}}</td>
            <td>{{$form->created_at}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
