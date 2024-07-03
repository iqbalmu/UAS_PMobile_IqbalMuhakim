import 'dart:convert';
import 'dart:io';
import 'dart:typed_data';

import 'package:flutter/material.dart';
import 'package:get/get.dart';
import 'package:get_storage/get_storage.dart';
import 'package:http/http.dart' as http;

class EditProfileController extends GetxController {
  var nik = "".obs;
  var bpjs = "".obs;
  var nama = "".obs;
  var email = "".obs;
  var jenisKelamin = "L".obs;
  var nomorHp = "".obs;
  var profesi = "".obs;
  var alamat = "".obs;
  var imageProfile = "".obs;
  var isLoading = false.obs;

  var profile_image_bytes = Rxn<Uint8List>();
  var profile_image_file = Rxn<File>();

  final GetStorage box = GetStorage();

  @override
  void onInit() {
    super.onInit();
    fetchData();
  }

  Future<void> fetchData() async {
    isLoading.value = true;
    try {
      final token = box.read('token');

      final response = await http.get(
          Uri.parse('https://allowing-eagle-moral.ngrok-free.app/api/user/profile'),
          headers: <String, String> {
            'Authorization': 'Bearer $token'
          }
      );

      if (response.statusCode == 200) {
        final data = json.decode(response.body)['data'];

        nik.value = data['profile']['nik'];
        bpjs.value = data['profile']['bpjs'];
        nama.value = data['nama'];
        email.value = data['email'];
        jenisKelamin.value = data['profile']['jenis_kelamin'];
        nomorHp.value = data['nomor_hp'];
        profesi.value = data['profile']['profesi'];
        alamat.value = data['profile']['alamat'];
        imageProfile.value = data['profile']['image_profile'];

      } else {
        Get.snackbar('Error', 'Failed to load data');
      }
    } catch (e) {
      Get.snackbar('Error', 'An error occurred');
    } finally {
      isLoading.value = false;
    }
  }

  Future<void> updateProfile() async {
    isLoading(true);
    try {
      final token = box.read('token');

      final url =
      Uri.parse('https://allowing-eagle-moral.ngrok-free.app/api/user/profile');
      var request = http.MultipartRequest('PUT', url);

      request.headers['Authorization'] = 'Bearer $token';

      if(profile_image_file.value != null) {
        request.files.add(
            await http.MultipartFile.fromPath(
              'image_profile',
              profile_image_file.value!.path,
            )
        );
      }

      request.fields['nik'] = nik.value;
      request.fields['bpjs'] = bpjs.value;
      request.fields['nama'] = nama.value;
      request.fields['email'] = email.value;
      request.fields['jenis_kelamin'] = jenisKelamin.value;
      request.fields['profesi'] = profesi.value;
      request.fields['alamat'] = alamat.value;
      request.fields['nomor_hp'] = nomorHp.value;

      print("REQUEST: ${request.fields}");

      var res = await request.send();
      print("RESPONSE : ${res.statusCode}");

      var response = await http.Response.fromStream(res);
      print("RESPONSE : ${response.body}");

      if (response.statusCode == 200) {
        var user = jsonDecode(response.body)['data'];
        Get.snackbar(
            "Success",
            "Data Profile Updated!",
            backgroundColor: const Color(0xFF2ECC71),
            colorText: Colors.white
        );
      } else {
        var error = jsonDecode(response.body)['errors'];
        // print("ERRORR!!!");

        if(error['nik'] != null) {
          Get.snackbar(
              "Input Error",
              "${error['nik']}",
              backgroundColor: const Color(0xFFE74C3C),
              colorText: Colors.white
          );
        }else {
          Get.snackbar(
              "Error",
              "Something was wrong !!!",
              backgroundColor: const Color(0xFFE74C3C),
              colorText: Colors.white
          );
        }

        print("FAILED!!: $error");
      }
    } catch (e) {
      print("ERROR!!!!: $e");
    }
    isLoading(false);
  }

}
