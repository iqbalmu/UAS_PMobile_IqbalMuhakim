import 'dart:convert';

import 'package:flutter/material.dart';
import 'package:get/get.dart';
import 'package:get_storage/get_storage.dart';
import 'package:http/http.dart' as http;

class ChangePasswordController extends GetxController {
  var password = "".obs;
  var newPassword = "".obs;
  var confirmPassword = "".obs;
  var isLoading = false.obs;

  Future<void> changePassword() async {
    isLoading(true);
    try {
      final GetStorage box = GetStorage();
      final token = box.read('token');
      final url = Uri.parse(
          'https://allowing-eagle-moral.ngrok-free.app/api/user/change-password');

      final response = await http.put(url, body: {
        'password': password.toString(),
        'newPassword': newPassword.toString(),
        'confirmPassword': confirmPassword.toString(),
      }, headers: <String, String>{
        'Authorization': 'Bearer $token'
      });

      print(jsonDecode(response.body));

      if (response.statusCode == 200) {
        print('SUCCESSFULL !!');
        Get.snackbar("Success", "Password has been updated",
            backgroundColor: const Color(0xFF2ECC71), colorText: Colors.white);
      } else {
        var error = jsonDecode(response.body)['errors'];
        Get.snackbar(
          "Error",
          error.toString(),
          backgroundColor: const Color(0xFFE74C3C),
          colorText: Colors.white,
        );
        print("FAILED: $error");
      }
    } catch (e) {
      print("ERROR: $e");
    }
    isLoading(false);
  }
}
