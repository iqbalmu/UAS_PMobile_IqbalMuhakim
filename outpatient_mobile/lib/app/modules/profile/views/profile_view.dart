import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';

import 'package:get/get.dart';
import 'package:outpatient_mobile/app/controllers/auth_controller.dart';
import 'package:outpatient_mobile/app/routes/app_pages.dart';
import 'package:outpatient_mobile/app/widgets/navbar.dart';

import '../controllers/profile_controller.dart';

class ProfileView extends GetView<ProfileController> {
  ProfileView({super.key});
  @override
  Widget build(BuildContext context) {
    Get.lazyPut(() => NavController());

    final AuthController _authController = Get.put(AuthController());

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
              'Settings',
              style: TextStyle(fontSize: 16),
            ),
            centerTitle: true,
            shadowColor: Colors.black,
          ),
        ),
      ),
      body: SingleChildScrollView(
        padding: const EdgeInsets.symmetric(horizontal: 16, vertical: 10),
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.start,
          children: [
            const Text(
              "General",
              style: TextStyle(fontSize: 16, fontWeight: FontWeight.w500),
            ),
            const SizedBox(height: 3),
            InkWell(
              onTap: () {
                Get.toNamed(Routes.EDIT_PROFILE);
              },
              child: Container(
                padding:
                    const EdgeInsets.symmetric(horizontal: 16, vertical: 14),
                margin: const EdgeInsets.symmetric(vertical: 7, horizontal: 5),
                decoration: BoxDecoration(
                    borderRadius: BorderRadius.circular(5.0),
                    color: const Color(0xFFECF0F1)),
                child: const Row(
                  mainAxisAlignment: MainAxisAlignment.spaceBetween,
                  crossAxisAlignment: CrossAxisAlignment.center,
                  children: [
                    Row(
                      children: [
                        Icon(
                          Icons.person_outline,
                          size: 24,
                        ),
                        SizedBox(width: 10),
                        Text("Edit Profile")
                      ],
                    ),
                    Icon(
                      Icons.arrow_forward_ios_rounded,
                      size: 18,
                    )
                  ],
                ),
              ),
            ),
            InkWell(
              onTap: () {
                Get.toNamed(Routes.CHANGE_PASSWORD);
              },
              child: Container(
                padding:
                    const EdgeInsets.symmetric(horizontal: 16, vertical: 14),
                margin: const EdgeInsets.symmetric(vertical: 7, horizontal: 5),
                decoration: BoxDecoration(
                    borderRadius: BorderRadius.circular(5.0),
                    color: const Color(0xFFECF0F1)),
                child: const Row(
                  mainAxisAlignment: MainAxisAlignment.spaceBetween,
                  crossAxisAlignment: CrossAxisAlignment.center,
                  children: [
                    Row(
                      children: [
                        Icon(
                          Icons.lock_outline,
                          size: 24,
                        ),
                        SizedBox(width: 10),
                        Text("Change Password")
                      ],
                    ),
                    Icon(
                      Icons.arrow_forward_ios_rounded,
                      size: 18,
                    )
                  ],
                ),
              ),
            ),
            Container(
              padding: const EdgeInsets.symmetric(horizontal: 16, vertical: 14),
              margin: const EdgeInsets.symmetric(vertical: 7, horizontal: 5),
              decoration: BoxDecoration(
                  borderRadius: BorderRadius.circular(5.0),
                  color: const Color(0xFFECF0F1)),
              child: const Row(
                mainAxisAlignment: MainAxisAlignment.spaceBetween,
                crossAxisAlignment: CrossAxisAlignment.center,
                children: [
                  Row(
                    children: [
                      Icon(
                        Icons.notifications_none,
                        size: 24,
                      ),
                      SizedBox(width: 10),
                      Text("Notification")
                    ],
                  ),
                  Icon(
                    Icons.arrow_forward_ios_rounded,
                    size: 18,
                  )
                ],
              ),
            ),
            Container(
              padding: const EdgeInsets.symmetric(horizontal: 16, vertical: 14),
              margin: const EdgeInsets.symmetric(vertical: 7, horizontal: 5),
              decoration: BoxDecoration(
                  borderRadius: BorderRadius.circular(5.0),
                  color: const Color(0xFFECF0F1)),
              child: const Row(
                mainAxisAlignment: MainAxisAlignment.spaceBetween,
                crossAxisAlignment: CrossAxisAlignment.center,
                children: [
                  Row(
                    children: [
                      Icon(
                        Icons.security_outlined,
                        size: 24,
                      ),
                      SizedBox(width: 10),
                      Text("Security")
                    ],
                  ),
                  Icon(
                    Icons.arrow_forward_ios_rounded,
                    size: 18,
                  )
                ],
              ),
            ),
            Container(
              padding: const EdgeInsets.symmetric(horizontal: 16, vertical: 14),
              margin: const EdgeInsets.symmetric(vertical: 7, horizontal: 5),
              decoration: BoxDecoration(
                  borderRadius: BorderRadius.circular(5.0),
                  color: const Color(0xFFECF0F1)),
              child: const Row(
                mainAxisAlignment: MainAxisAlignment.spaceBetween,
                crossAxisAlignment: CrossAxisAlignment.center,
                children: [
                  Row(
                    children: [
                      Icon(
                        Icons.language_outlined,
                        size: 24,
                      ),
                      SizedBox(width: 10),
                      Text("Language")
                    ],
                  ),
                  Icon(
                    Icons.arrow_forward_ios_rounded,
                    size: 18,
                  )
                ],
              ),
            ),
            const SizedBox(height: 20),
            const Text(
              "Preferencess",
              style: TextStyle(fontSize: 16, fontWeight: FontWeight.w500),
            ),
            const SizedBox(height: 3),
            Container(
              padding: const EdgeInsets.symmetric(horizontal: 16, vertical: 14),
              margin: const EdgeInsets.symmetric(vertical: 7, horizontal: 5),
              decoration: BoxDecoration(
                  borderRadius: BorderRadius.circular(5.0),
                  color: const Color(0xFFECF0F1)),
              child: const Row(
                mainAxisAlignment: MainAxisAlignment.spaceBetween,
                crossAxisAlignment: CrossAxisAlignment.center,
                children: [
                  Row(
                    children: [
                      Icon(
                        Icons.shield_outlined,
                        size: 24,
                      ),
                      SizedBox(width: 10),
                      Text("Legal and Policies")
                    ],
                  ),
                  Icon(
                    Icons.arrow_forward_ios_rounded,
                    size: 18,
                  )
                ],
              ),
            ),
            Container(
              padding: const EdgeInsets.symmetric(horizontal: 16, vertical: 14),
              margin: const EdgeInsets.symmetric(vertical: 7, horizontal: 5),
              decoration: BoxDecoration(
                  borderRadius: BorderRadius.circular(5.0),
                  color: const Color(0xFFECF0F1)),
              child: const Row(
                mainAxisAlignment: MainAxisAlignment.spaceBetween,
                crossAxisAlignment: CrossAxisAlignment.center,
                children: [
                  Row(
                    children: [
                      Icon(
                        Icons.support_agent_rounded,
                        size: 24,
                      ),
                      SizedBox(width: 10),
                      Text("Help & Support")
                    ],
                  ),
                  Icon(
                    Icons.arrow_forward_ios_rounded,
                    size: 18,
                  )
                ],
              ),
            ),
            InkWell(
              onTap: () {
                _authController.logout();
              },
              child: Container(
                padding: const EdgeInsets.symmetric(horizontal: 16, vertical: 14),
                margin: const EdgeInsets.symmetric(vertical: 7, horizontal: 5),
                decoration: BoxDecoration(
                    borderRadius: BorderRadius.circular(5.0),
                    color: const Color(0xFFECF0F1)),
                child: const Row(
                  mainAxisAlignment: MainAxisAlignment.spaceBetween,
                  crossAxisAlignment: CrossAxisAlignment.center,
                  children: [
                    Row(
                      children: [
                        Icon(
                          Icons.logout,
                          size: 24,
                          color: Color(0xFFE74C3C),
                        ),
                        SizedBox(width: 10),
                        Text(
                          "Logout",
                          style: TextStyle(
                              color: Color(0xFFE74C3C),
                              fontWeight: FontWeight.bold),
                        )
                      ],
                    )
                  ],
                ),
              ),
            ),
          ],
        ),
      ),
      bottomNavigationBar: MainNavbar(),
    );
  }
}
