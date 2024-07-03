import 'package:flutter/material.dart';

import 'package:get/get.dart';
import '../controllers/change_password_controller.dart';

class ChangePasswordView extends GetView<ChangePasswordController> {
  ChangePasswordView({super.key});

  final _formKey = GlobalKey<FormState>();

  @override
  Widget build(BuildContext context) {
    return Scaffold(
        appBar: PreferredSize(
          preferredSize: const Size.fromHeight(kToolbarHeight),
          child: Container(
            decoration: BoxDecoration(
              boxShadow: [
                BoxShadow(
                  color: Colors.grey.withOpacity(0.3),
                  spreadRadius: 0.3,
                  blurRadius: 0.3,
                  offset: const Offset(0, 0.5), // changes position of shadow
                ),
              ],
            ),
            child: AppBar(
              title: const Text(
                'Change Password',
                style: TextStyle(fontSize: 16),
              ),
              centerTitle: true,
              shadowColor: Colors.black,
            ),
          ),
        ),
        body: Padding(
          padding: const EdgeInsets.symmetric(horizontal: 20, vertical: 20),
          child: Form(
            key: _formKey,
            child: Column(
              crossAxisAlignment: CrossAxisAlignment.start,
              children: [
                const Text(
                  "Current Password",
                  style: TextStyle(
                    fontSize: 14,
                    // fontWeight: FontWeight.w600,
                  ),
                ),
                const SizedBox(height: 7),
                TextFormField(
                  onChanged: (value) => controller.password.value = value,
                  decoration: InputDecoration(
                    contentPadding:
                        const EdgeInsets.symmetric(vertical: 10, horizontal: 12),
                    hintText: 'Type your password',
                    hintStyle: TextStyle(
                      color: Colors.grey[400],
                    ),
                    enabledBorder: OutlineInputBorder(
                      borderSide: const BorderSide(color: Colors.transparent),
                      borderRadius: BorderRadius.circular(10.0),
                    ),
                    focusedBorder: OutlineInputBorder(
                      borderSide: const BorderSide(color: Color(0xFF16A085)),
                      borderRadius: BorderRadius.circular(10.0),
                    ),
                    filled: true,
                    fillColor: Colors.blueGrey.withOpacity(0.1),
                    prefixIcon: Icon(Icons.lock, color: Colors.grey[400]),
                  ),
                  style: const TextStyle(color: Colors.black),
                  obscureText: true,
                  validator: (value) {
                    if (value == null || value.isEmpty) {
                      return 'Please enter your password';
                    }
                    return null;
                  },
                ),
                const SizedBox(height: 15),
                const Text(
                  "New Password",
                  style: TextStyle(
                    fontSize: 14,
                    // fontWeight: FontWeight.w600,
                  ),
                ),
                const SizedBox(height: 7),
                TextFormField(
                  onChanged: (value) => controller.newPassword.value = value,
                  decoration: InputDecoration(
                    contentPadding:
                        const EdgeInsets.symmetric(vertical: 10, horizontal: 12),
                    hintText: 'Enter new password',
                    hintStyle: TextStyle(
                      color: Colors.grey[400],
                    ),
                    enabledBorder: OutlineInputBorder(
                      borderSide: const BorderSide(color: Colors.transparent),
                      borderRadius: BorderRadius.circular(10.0),
                    ),
                    focusedBorder: OutlineInputBorder(
                      borderSide: const BorderSide(color: Color(0xFF16A085)),
                      borderRadius: BorderRadius.circular(10.0),
                    ),
                    filled: true,
                    fillColor: Colors.blueGrey.withOpacity(0.1),
                    prefixIcon: Icon(Icons.lock, color: Colors.grey[400]),
                  ),
                  style: const TextStyle(color: Colors.black),
                  obscureText: true,
                  validator: (value) {
                    if (value == null || value.isEmpty) {
                      return 'Please enter your password';
                    }
                    return null;
                  },
                ),
                const SizedBox(height: 15),
                const Text(
                  "Confirm Password",
                  style: TextStyle(
                    fontSize: 14,
                    // fontWeight: FontWeight.w600,
                  ),
                ),
                const SizedBox(height: 7),
                TextFormField(
                  onChanged: (value) => controller.confirmPassword.value = value,
                  decoration: InputDecoration(
                    contentPadding:
                        const EdgeInsets.symmetric(vertical: 10, horizontal: 12),
                    hintText: 'Confirm your new password',
                    hintStyle: TextStyle(
                      color: Colors.grey[400],
                    ),
                    enabledBorder: OutlineInputBorder(
                      borderSide: const BorderSide(color: Colors.transparent),
                      borderRadius: BorderRadius.circular(10.0),
                    ),
                    focusedBorder: OutlineInputBorder(
                      borderSide: const BorderSide(color: Color(0xFF16A085)),
                      borderRadius: BorderRadius.circular(10.0),
                    ),
                    filled: true,
                    fillColor: Colors.blueGrey.withOpacity(0.1),
                    prefixIcon: Icon(Icons.lock, color: Colors.grey[400]),
                  ),
                  style: const TextStyle(color: Colors.black),
                  obscureText: true,
                  validator: (value) {
                    if (value == null || value.isEmpty) {
                      return 'Please enter your password';
                    }
                    return null;
                  },
                ),
                Expanded(child: Container()),
                Align(
                  alignment: Alignment.bottomCenter,
                  child: SizedBox(
                    width: Get.width,
                    child: ElevatedButton(
                        onPressed: () {
                          if (_formKey.currentState!.validate()) {
                            controller.changePassword();
                          }
                        },
                        style: ElevatedButton.styleFrom(
                            backgroundColor: const Color(0xFF16A085),
                            foregroundColor: Colors.white,
                            padding: const EdgeInsets.symmetric(vertical: 15)),
                        child: Obx(() {
                          return controller.isLoading.value
                              ? const SizedBox(
                            height: 24,
                            width: 24,
                            child: CircularProgressIndicator(
                              color: Colors.white,
                            ),
                          )
                              : const Text(
                            'Change Now',
                            style: TextStyle(fontSize: 18),
                          );
                        })),
                  ),
                ),
                const SizedBox(height: 20),
              ],
            ),
          ),
        ));
  }
}
