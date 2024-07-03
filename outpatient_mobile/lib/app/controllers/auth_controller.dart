import 'dart:convert';
import 'package:flutter/material.dart';
import 'package:get/get.dart';
import 'package:get_storage/get_storage.dart';
import 'package:http/http.dart' as http;
import 'package:outpatient_mobile/app/routes/app_pages.dart';

class AuthController extends GetxController {
  var email = ''.obs;
  var password = ''.obs;
  var isLoading = false.obs;
  var isLoggedIn = false.obs;

  final GetStorage box = GetStorage();

  @override
  void onInit() {
    super.onInit();
    ever(isLoggedIn, handleAuthChanged);
    checkLoginStatus();
  }

  void checkLoginStatus() {
    var token = box.read('token');
    if (token != null) {
      isLoggedIn.value = true;
    }
  }

  void handleAuthChanged(bool isLoggedIn) {
    if (!isLoggedIn) {
      Get.offAllNamed(Routes.LOGIN);
    }
  }

  Future<void> checkToken() async {
    isLoading(true);
    try {
      final url = Uri.parse(
          'https://allowing-eagle-moral.ngrok-free.app/api/check-token');
      final response = await http.get(url);

      if (response.statusCode == 200) {
        var message = jsonDecode(response.body)['message'];
        print("MESSAGE: $message");
      } else {
        Get.snackbar("Login Error", "Invalid Username or Password",
            backgroundColor: const Color(0xFFE74C3C), colorText: Colors.white);
      }
    } catch (e) {
      print("ERROR: $e");
    }
    isLoading(false);
  }

  Future<void> login() async {
    isLoading(true);
    try {
      final url = Uri.parse(
          'https://allowing-eagle-moral.ngrok-free.app/api/auth/login');
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

        box.write('token', token);
        box.write('user', user);
        isLoggedIn.value = true;

        // cek profile ?
        if (user['profile'] != null) {
          Get.offNamed(Routes.HOME);
        } else {
          Get.offNamed(Routes.ONBOARDING);
        }
      } else {
        // print('FAILED TO LOGIN !!: ${response.body}');
        // var error = jsonDecode(response.body)['errors'];
        Get.snackbar("Login Error", "Invalid Username or Password",
            backgroundColor: const Color(0xFFE74C3C), colorText: Colors.white);
      }
    } catch (e) {
      print("ERROR: $e");
    }
    isLoading(false);
  }

  void logout() {
    box.erase();
    isLoggedIn.value = false;
  }
}
