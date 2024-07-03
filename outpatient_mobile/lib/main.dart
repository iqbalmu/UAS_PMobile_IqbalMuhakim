import 'dart:io';

import 'package:flutter/material.dart';
import 'package:flutter/services.dart';

import 'package:get/get.dart';
import 'package:get_storage/get_storage.dart';
import 'package:outpatient_mobile/app/controllers/auth_controller.dart';

import 'app/routes/app_pages.dart';

void main() async {
  WidgetsFlutterBinding.ensureInitialized();
  await GetStorage.init();
  final AuthController authController = Get.put(AuthController());

  runApp(GetMaterialApp(
    title: "Application",
    initialRoute: authController.isLoggedIn.isTrue ? Routes.HOME : Routes.LOGIN,
    // initialRoute: Routes.LOGIN,
    getPages: AppPages.routes,
    debugShowCheckedModeBanner: false,
    theme: ThemeData(
      scaffoldBackgroundColor: Colors.white,
      // fontFamily: 'Nunito',
      primaryColor: const Color(0xFF16A085),
      appBarTheme: const AppBarTheme(
        backgroundColor: Colors.white,
      ),
      bottomNavigationBarTheme: const BottomNavigationBarThemeData(
        backgroundColor: Colors.white,
        selectedItemColor: Color(0xFF16A085),
        unselectedItemColor: Colors.grey,
      ),
    ),
  ));
}

