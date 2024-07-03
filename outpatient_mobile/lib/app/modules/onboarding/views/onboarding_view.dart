import 'dart:io';

import 'package:flutter/material.dart';

import 'package:get/get.dart';
import 'package:image_picker/image_picker.dart';
import 'package:introduction_screen/introduction_screen.dart';
import 'package:lottie/lottie.dart';
import 'package:outpatient_mobile/app/modules/home/views/home_view.dart';

import '../controllers/onboarding_controller.dart';

class OnboardingView extends StatefulWidget {
  const OnboardingView({super.key});

  @override
  OnBoardingPageState createState() => OnBoardingPageState();
}

class OnBoardingPageState extends State<OnboardingView> {
  final OnboardingController controller = Get.put(OnboardingController());
  final introKey = GlobalKey<IntroductionScreenState>();
  final GlobalKey<FormState> _formKey = GlobalKey<FormState>();

  Future _pickImage(ImageSource source) async {
    final returnImage = await ImagePicker().pickImage(source: source);
    if (returnImage == null) return;
    final imageBytes = File(returnImage.path).readAsBytesSync();
    final imageFile = File(returnImage.path);
    setState(() {
      // selectedIMage = File(returnImage.path);
      // _image = File(returnImage.path).readAsBytesSync();
      controller.profile_image_bytes.value = imageBytes;
      controller.profile_image_file.value = imageFile;
    });
    print("PROFILE IMAGE FILE: ${controller.profile_image_file.value}");
    Navigator.of(context).pop(); //close the model sheet
  }

  void showImagePickerOption(BuildContext context) {
    showModalBottomSheet(
        backgroundColor: const Color(0xFF16A085),
        context: context,
        builder: (builder) {
          return Padding(
            padding: const EdgeInsets.all(18.0),
            child: SizedBox(
              width: MediaQuery.of(context).size.width,
              height: MediaQuery.of(context).size.height / 7.5,
              child: Row(
                children: [
                  Expanded(
                    child: InkWell(
                      onTap: () {
                        _pickImage(ImageSource.gallery);
                      },
                      child: const SizedBox(
                        child: Column(
                          children: [
                            Icon(
                              Icons.image,
                              size: 50,
                              color: Colors.white,
                            ),
                            Text("Gallery")
                          ],
                        ),
                      ),
                    ),
                  ),
                  Expanded(
                    child: InkWell(
                      onTap: () {
                        _pickImage(ImageSource.camera);
                      },
                      child: const SizedBox(
                        child: Column(
                          children: [
                            Icon(
                              Icons.camera_alt,
                              size: 50,
                              color: Colors.white,
                            ),
                            Text("Camera")
                          ],
                        ),
                      ),
                    ),
                  ),
                ],
              ),
            ),
          );
        });
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: IntroductionScreen(
        pages: [
          PageViewModel(
            title: '',
            bodyWidget: Column(
              mainAxisAlignment: MainAxisAlignment.center,
              children: [
                const SizedBox(height: 10),
                SizedBox(
                  width: 250,
                  height: 200,
                  child: Lottie.asset('assets/lottie/onboard-1.json'),
                ),
                const SizedBox(height: 70),
                const Text(
                  'Hallooo! ',
                  style: TextStyle(
                      fontSize: 24,
                      fontWeight: FontWeight.bold,
                      color: Colors.black87),
                ),
                const SizedBox(height: 10),
                const Text(
                  "Thank you for choosing Outpatient-App. Enjoy a convenient and efficient outpatient experience, right from the palm of your hand",
                  textAlign: TextAlign.center,
                  style: TextStyle(fontSize: 14, color: Colors.blueGrey),
                ),
              ],
            ),
          ),
          PageViewModel(
            title: '',
            bodyWidget: Column(
              mainAxisAlignment: MainAxisAlignment.center,
              children: [
                const SizedBox(height: 10),
                SizedBox(
                  width: 250,
                  height: 200,
                  child: Lottie.asset('assets/lottie/onboard-1.json'),
                ),
                const SizedBox(height: 70),
                const Text(
                  'Hallooo! ',
                  style: TextStyle(
                      fontSize: 24,
                      fontWeight: FontWeight.bold,
                      color: Colors.black87),
                ),
                const SizedBox(height: 10),
                const Text(
                  "Thank you for choosing Outpatient-App. Enjoy a convenient and efficient outpatient experience, right from the palm of your hand",
                  textAlign: TextAlign.center,
                  style: TextStyle(fontSize: 14, color: Colors.blueGrey),
                ),
              ],
            ),
          ),
          PageViewModel(
            title: "",
            bodyWidget: Column(
              mainAxisAlignment: MainAxisAlignment.center,
              children: [
                Center(
                  child: Stack(
                    children: [
                      Obx(() {
                        return controller.profile_image_bytes.value != null
                            ? CircleAvatar(
                          radius: 65,
                          backgroundImage: MemoryImage(controller.profile_image_bytes.value!),
                        )
                            : const CircleAvatar(
                          radius: 65,
                          backgroundImage: NetworkImage(
                              "https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png"),
                        );
                      }),
                      Positioned(
                          bottom: -10,
                          right: 0,
                          child: IconButton(
                              onPressed: () {
                                showImagePickerOption(context);
                              },
                              icon: const Icon(
                                Icons.add_a_photo,
                                size: 30,
                              )))
                    ],
                  ),
                ),
                const SizedBox(height: 20),
                Padding(
                  padding: const EdgeInsets.symmetric(horizontal: 15),
                  child: Form(
                    key: _formKey,
                    child: Column(
                      crossAxisAlignment: CrossAxisAlignment.start,
                      children: [
                        const Text(
                          "NIK",
                          style: TextStyle(
                            fontSize: 16,
                            fontWeight: FontWeight.w400,
                          ),
                        ),
                        const SizedBox(height: 7),
                        TextFormField(
                          onChanged: (value) => controller.nik.value = value,
                          decoration: InputDecoration(
                            contentPadding: const EdgeInsets.symmetric(
                                vertical: 10, horizontal: 12),
                            hintText: 'Enter your NIK',
                            hintStyle: TextStyle(
                              color: Colors.grey[400],
                              fontWeight: FontWeight.w400,
                            ),
                            enabledBorder: OutlineInputBorder(
                              borderSide:
                                  const BorderSide(color: Colors.transparent),
                              borderRadius: BorderRadius.circular(15.0),
                            ),
                            focusedBorder: OutlineInputBorder(
                              borderSide:
                                  const BorderSide(color: Color(0xFF16A085)),
                              borderRadius: BorderRadius.circular(15.0),
                            ),
                            filled: true,
                            fillColor: Colors.blueGrey.withOpacity(0.1),
                            prefixIcon:
                                Icon(Icons.person, color: Colors.grey[400]),
                          ),
                          style: const TextStyle(color: Colors.black),
                          keyboardType: TextInputType.number,
                          validator: (value) {
                            if (value == null || value.isEmpty) {
                              return 'This field is required !!';
                            }
                            return null;
                          },
                        ),
                        const SizedBox(height: 10.0),
                        const Text(
                          "BPJS",
                          style: TextStyle(
                            fontSize: 16,
                            fontWeight: FontWeight.w400,
                          ),
                        ),
                        const SizedBox(height: 7),
                        TextFormField(
                          onChanged: (value) => controller.bpjs.value = value,
                          decoration: InputDecoration(
                            contentPadding: const EdgeInsets.symmetric(
                                vertical: 10, horizontal: 12),
                            hintText: 'Enter your BPJS number',
                            hintStyle: TextStyle(
                              color: Colors.grey[400],
                              fontWeight: FontWeight.w400,
                            ),
                            enabledBorder: OutlineInputBorder(
                              borderSide:
                              const BorderSide(color: Colors.transparent),
                              borderRadius: BorderRadius.circular(15.0),
                            ),
                            focusedBorder: OutlineInputBorder(
                              borderSide:
                              const BorderSide(color: Color(0xFF16A085)),
                              borderRadius: BorderRadius.circular(15.0),
                            ),
                            filled: true,
                            fillColor: Colors.blueGrey.withOpacity(0.1),
                            prefixIcon:
                            Icon(Icons.person, color: Colors.grey[400]),
                          ),
                          style: const TextStyle(color: Colors.black),
                          keyboardType: TextInputType.number,
                          validator: (value) {
                            if (value == null || value.isEmpty) {
                              return 'This field is required !!';
                            }
                            return null;
                          },
                        ),
                        const SizedBox(height: 10.0),
                        const Text(
                          "Jenis Kelamin",
                          style: TextStyle(
                            fontSize: 16,
                            fontWeight: FontWeight.w400,
                          ),
                        ),
                        const SizedBox(height: 7),
                        DropdownButtonFormField<String>(
                          items: const [
                            DropdownMenuItem(
                              value: 'L',
                              child: Text('Laki-Laki'),
                            ),
                            DropdownMenuItem(
                              value: 'P',
                              child: Text('Perempuan'),
                            ),
                          ],
                          onChanged: (value) =>
                              controller.jenis_kelamin.value = value!,
                          validator: (value) {
                            if (value == null || value.isEmpty) {
                              return 'This field is required !!';
                            }
                            return null;
                          },
                          style: const TextStyle(color: Colors.black),
                          hint: Stack(
                            alignment: Alignment.center,
                            children: [
                              Text(
                                'Tambahkan Jenis Kelamin',
                                style: TextStyle(
                                  color: Colors.grey[400],
                                  fontWeight: FontWeight.w400,
                                ),
                              ),
                            ],
                          ),
                          decoration: InputDecoration(
                            contentPadding: const EdgeInsets.symmetric(
                              vertical: 13,
                              horizontal: 12,
                            ),
                            enabledBorder: OutlineInputBorder(
                              borderSide:
                                  const BorderSide(color: Colors.transparent),
                              borderRadius: BorderRadius.circular(15.0),
                            ),
                            focusedBorder: OutlineInputBorder(
                              borderSide:
                                  const BorderSide(color: Color(0xFF16A085)),
                              borderRadius: BorderRadius.circular(15.0),
                            ),
                            filled: true,
                            fillColor: Colors.blueGrey.withOpacity(0.1),
                            prefixIcon: Icon(Icons.wc, color: Colors.grey[400]),
                          ),
                          isExpanded: true,
                        ),
                        const SizedBox(height: 10.0),
                        const Text(
                          "Profesi",
                          style: TextStyle(
                            fontSize: 16,
                            fontWeight: FontWeight.w400,
                          ),
                        ),
                        const SizedBox(height: 7),
                        TextFormField(
                          onChanged: (value) =>
                              controller.profesi.value = value,
                          decoration: InputDecoration(
                            contentPadding: const EdgeInsets.symmetric(
                                vertical: 10, horizontal: 12),
                            hintText: 'Enter your current profession',
                            hintStyle: TextStyle(
                              color: Colors.grey[400],
                              fontWeight: FontWeight.w400,
                            ),
                            enabledBorder: OutlineInputBorder(
                              borderSide:
                                  const BorderSide(color: Colors.transparent),
                              borderRadius: BorderRadius.circular(15.0),
                            ),
                            focusedBorder: OutlineInputBorder(
                              borderSide:
                                  const BorderSide(color: Color(0xFF16A085)),
                              borderRadius: BorderRadius.circular(15.0),
                            ),
                            filled: true,
                            fillColor: Colors.blueGrey.withOpacity(0.1),
                            prefixIcon:
                                Icon(Icons.work, color: Colors.grey[400]),
                          ),
                          style: const TextStyle(color: Colors.black),
                          validator: (value) {
                            if (value == null || value.isEmpty) {
                              return 'This field is required !!';
                            }
                            return null;
                          },
                        ),
                        const SizedBox(height: 10.0),
                        const Text(
                          "Alamat",
                          style: TextStyle(
                            fontSize: 16,
                            fontWeight: FontWeight.w400,
                          ),
                        ),
                        const SizedBox(height: 7),
                        TextFormField(
                          onChanged: (value) => controller.alamat.value = value,
                          decoration: InputDecoration(
                            contentPadding: const EdgeInsets.symmetric(
                                vertical: 10, horizontal: 12),
                            hintText: 'Enter your current address',
                            hintStyle: TextStyle(
                              color: Colors.grey[400],
                              fontWeight: FontWeight.w400,
                            ),
                            enabledBorder: OutlineInputBorder(
                              borderSide:
                                  const BorderSide(color: Colors.transparent),
                              borderRadius: BorderRadius.circular(15.0),
                            ),
                            focusedBorder: OutlineInputBorder(
                              borderSide:
                                  const BorderSide(color: Color(0xFF16A085)),
                              borderRadius: BorderRadius.circular(15.0),
                            ),
                            filled: true,
                            fillColor: Colors.blueGrey.withOpacity(0.1),
                            prefixIcon:
                                Icon(Icons.home, color: Colors.grey[400]),
                          ),
                          style: const TextStyle(color: Colors.black),
                          validator: (value) {
                            if (value == null || value.isEmpty) {
                              return 'This field is required !!';
                            }
                            return null;
                          },
                        ),
                        const SizedBox(height: 30),
                        SizedBox(
                          width: Get.width,
                          child: ElevatedButton(
                              onPressed: () {
                                if (_formKey.currentState!.validate()) {
                                  controller.createProfile();
                                }
                              },
                              style: ElevatedButton.styleFrom(
                                  backgroundColor: const Color(0xFF16A085),
                                  foregroundColor: Colors.white,
                                  padding:
                                      const EdgeInsets.symmetric(vertical: 15)),
                              child: Obx(() {
                                return controller.isLoading.value
                                    ? const SizedBox(
                                        width: 24,
                                        height: 24,
                                        child: CircularProgressIndicator(
                                          color: Colors.white,
                                        ),
                                      )
                                    : const Text(
                                        'Create Profile',
                                        style: TextStyle(fontSize: 18),
                                      );
                              })),
                        ),
                      ],
                    ),
                  ),
                ),
              ],
            ),
            // image: Center(child: Icon(Icons.person, size: 100)),
          ),
        ],
        onDone: () {
          if (_formKey.currentState!.validate()) {
            controller.createProfile();
          }
        },
        showSkipButton: true,
        skip: const Text(
          "Skip",
          style: TextStyle(color: Color(0xFF16A085)),
        ),
        next: const Icon(
          Icons.arrow_forward,
          color: Color(0xFF16A085),
        ),
        done: const Text("Done",
            style: TextStyle(
              fontWeight: FontWeight.w600,
              color: Color(0xFF16A085),
            )),
        dotsDecorator: DotsDecorator(
          size: const Size.square(10.0),
          activeSize: const Size(22.0, 10.0),
          activeColor: Theme.of(context).primaryColor,
          color: Colors.black26,
          spacing: const EdgeInsets.symmetric(horizontal: 3.0),
          activeShape: RoundedRectangleBorder(
            borderRadius: BorderRadius.circular(25.0),
          ),
        ),
      ),
    );
  }
}
