import 'dart:convert';

import 'package:flutter/material.dart';
import 'package:get/get.dart';
import 'package:http/http.dart' as http;

class RegisterController extends GetxController {
  var name = ''.obs;
  var email = ''.obs;
  var phone = ''.obs;
  var password = ''.obs;
  var isLoading = false.obs;

  Future<void> register() async {
    isLoading(true);
    try {
      final url =
          Uri.parse('https://allowing-eagle-moral.ngrok-free.app/api/auth/register');
      final response = await http.post(
        url,
        body: {
          'nama': name.toString(),
          'email': email.toString(),
          'nomor_hp': phone.toString(),
          'password': password.toString(),
        },
      );

      if (response.statusCode == 200) {
        // print('REGISTER SUCCESSFULL !!');
        Get.snackbar(
            "Register Success",
            "account created successfully",
            backgroundColor: const Color(0xFF2ECC71),
            colorText: Colors.white
        );
        Get.offNamed('/login');
      } else {
        var error =  jsonDecode(response.body)['errors'];

        if(error['email'].toString() == '[The email has already been taken.]') {
          Get.snackbar(
              "Register Error",
              "the email has already been taken",
              backgroundColor: const Color(0xFFE74C3C),
              colorText: Colors.white
          );
        }
        else if(error['nomor_hp'].toString() == '[The nomor hp has already been taken.]') {
          Get.snackbar(
              "Register Error",
              "the phone number has already been taken",
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
