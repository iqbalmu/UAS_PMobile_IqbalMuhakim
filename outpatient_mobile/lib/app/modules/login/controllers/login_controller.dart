import 'dart:convert';
import 'package:flutter/material.dart';
import 'package:get/get.dart';
import 'package:http/http.dart' as http;
import 'package:outpatient_mobile/app/routes/app_pages.dart';
import 'package:shared_preferences/shared_preferences.dart';

class LoginController extends GetxController {
  var email = ''.obs;
  var password = ''.obs;
  var isLoading = false.obs;

  Future<void> login() async {
    isLoading(true);
    try {
      final url =
          Uri.parse('https://allowing-eagle-moral.ngrok-free.app/api/auth/login');
      final response = await http.post(
        url,
        body: {
          'email': email.toString(),
          'password': password.toString(),
        },
      );

      if (response.statusCode == 200) {
        var token = jsonDecode(response.body)['data']['token'];
        var user = jsonDecode(response.body)['data']['user'];
        final prefs = await SharedPreferences.getInstance();
        await prefs.setString('jwt_token', token);
        await prefs.setString("user", user['nama']);

        // cek profile ?
        if(user['profile'] != null){
          // true -> home page
          Get.offNamed(Routes.HOME);
        }else{
          // false -> onboarding page
          Get.offNamed(Routes.ONBOARDING);
        }
      } else {
        // print('FAILED TO LOGIN !!: ${response.body}');
        // var error = jsonDecode(response.body)['errors'];
        Get.snackbar(
          "Login Error",
          "Invalid Username or Password",
          backgroundColor: const Color(0xFFE74C3C),
          colorText: Colors.white
        );
      }
    } catch (e) {
      print("ERROR: $e");
    }
    isLoading(false);
  }
}
