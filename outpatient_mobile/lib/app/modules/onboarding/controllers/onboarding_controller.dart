import 'dart:convert';
import 'dart:io';
import 'dart:typed_data';

import 'package:flutter/material.dart';
import 'package:get/get.dart';
import 'package:get_storage/get_storage.dart';
import 'package:http/http.dart' as http;
import 'package:shared_preferences/shared_preferences.dart';

import '../../../routes/app_pages.dart';

class OnboardingController extends GetxController {
  var nik = ''.obs;
  var bpjs = ''.obs;
  var jenis_kelamin = ''.obs;
  var profesi = ''.obs;
  var alamat = ''.obs;
  var profile_image_bytes = Rxn<Uint8List>();
  var profile_image_file = Rxn<File>();
  var isLoading = false.obs;

  Future<void> createProfile() async {
    isLoading(true);
    try {
      final GetStorage box = GetStorage();
      final token = box.read('token');

      final url =
      Uri.parse('https://allowing-eagle-moral.ngrok-free.app/api/user/profile');
      var request = http.MultipartRequest('POST', url);

      request.headers['Authorization'] = 'Bearer $token';

      request.files.add(
        await http.MultipartFile.fromPath(
            'image_profile',
            profile_image_file.value!.path,
        )
      );

      request.fields['nik'] = nik.value;
      request.fields['bpjs'] = bpjs.value;
      request.fields['jenis_kelamin'] = jenis_kelamin.value;
      request.fields['profesi'] = profesi.value;
      request.fields['alamat'] = alamat.value;

      var res = await request.send();
      var response = await http.Response.fromStream(res);

      print("RESPONSE : ${response.body}");

      if (response.statusCode == 200) {
        var user = jsonDecode(response.body)['data'];
        // print("SUCCESSS!!!");
        Get.snackbar(
            "Welcome",
            "haloo..!! selamat datang ${user['nama']}",
            backgroundColor: const Color(0xFF2ECC71),
            colorText: Colors.white
        );
        Get.offAllNamed(Routes.HOME);
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
              "Register Error",
              "Something was wrong !!!",
              backgroundColor: const Color(0xFFE74C3C),
              colorText: Colors.white
          );
        }

        print("FAILED TO REGISTER !!: $error");
      }
    } catch (e) {
      print("ERROR REGISTER: $e");
    }
    isLoading(false);
  }

}
