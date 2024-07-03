import 'dart:io';

import 'package:flutter/material.dart';

import 'package:get/get.dart';
import 'package:image_picker/image_picker.dart';

import '../controllers/edit_profile_controller.dart';

class EditProfileView extends StatefulWidget {
  const EditProfileView({super.key});

  @override
  EditProfileState createState() => EditProfileState();
}

class EditProfileState extends State<EditProfileView> {
  final EditProfileController controller = Get.put(EditProfileController());
  final GlobalKey<FormState> _formKey = GlobalKey<FormState>();

  Future _pickImage(ImageSource source) async {
    final returnImage = await ImagePicker().pickImage(source: source);
    if (returnImage == null) return;
    final imageBytes = File(returnImage.path).readAsBytesSync();
    final imageFile = File(returnImage.path);
    setState(() {
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
              'Edit Profile',
              style: TextStyle(fontSize: 16),
            ),
            centerTitle: true,
            shadowColor: Colors.black,
          ),
        ),
      ),
      body: Padding(
        padding: const EdgeInsets.symmetric(horizontal: 30, vertical: 20),
        child: Obx(
          () => controller.isLoading.value
              ? const Center(
                  child: CircularProgressIndicator(color: Color(0xFF16A085)))
              : Column(
                  children: [
                    Center(
                      child: Stack(
                        children: [
                          Obx(
                            () {
                              return controller.profile_image_bytes.value !=
                                      null
                                  ? CircleAvatar(
                                      radius: 65,
                                      backgroundImage: MemoryImage(controller
                                          .profile_image_bytes.value!),
                                    )
                                  : CircleAvatar(
                                      radius: 55,
                                      backgroundImage: controller
                                              .imageProfile.isNotEmpty
                                          ? NetworkImage(
                                              "https://allowing-eagle-moral.ngrok-free.app/uploads/pasien/${controller.imageProfile.value}")
                                          : const NetworkImage(
                                              "https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png"),
                                    );
                            },
                          ),
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
                    const SizedBox(height: 10),
                    Expanded(
                      child: SingleChildScrollView(
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
                                onChanged: (value) =>
                                    controller.nik.value = value,
                                initialValue: controller.nik.value,
                                decoration: InputDecoration(
                                  contentPadding: const EdgeInsets.symmetric(
                                      vertical: 10, horizontal: 12),
                                  hintText: 'Enter your NIK',
                                  hintStyle: TextStyle(
                                    color: Colors.grey[400],
                                    fontWeight: FontWeight.w400,
                                  ),
                                  enabledBorder: OutlineInputBorder(
                                    borderSide: const BorderSide(
                                        color: Colors.transparent),
                                    borderRadius: BorderRadius.circular(15.0),
                                  ),
                                  focusedBorder: OutlineInputBorder(
                                    borderSide: const BorderSide(
                                        color: Color(0xFF16A085)),
                                    borderRadius: BorderRadius.circular(15.0),
                                  ),
                                  filled: true,
                                  fillColor: Colors.blueGrey.withOpacity(0.1),
                                  prefixIcon: Icon(Icons.badge_outlined,
                                      color: Colors.grey[400]),
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
                                onChanged: (value) =>
                                    controller.bpjs.value = value,
                                initialValue: controller.bpjs.value,
                                decoration: InputDecoration(
                                  contentPadding: const EdgeInsets.symmetric(
                                      vertical: 10, horizontal: 12),
                                  hintText: 'Enter your BPJS number',
                                  hintStyle: TextStyle(
                                    color: Colors.grey[400],
                                    fontWeight: FontWeight.w400,
                                  ),
                                  enabledBorder: OutlineInputBorder(
                                    borderSide: const BorderSide(
                                        color: Colors.transparent),
                                    borderRadius: BorderRadius.circular(15.0),
                                  ),
                                  focusedBorder: OutlineInputBorder(
                                    borderSide: const BorderSide(
                                        color: Color(0xFF16A085)),
                                    borderRadius: BorderRadius.circular(15.0),
                                  ),
                                  filled: true,
                                  fillColor: Colors.blueGrey.withOpacity(0.1),
                                  prefixIcon: Icon(Icons.badge_outlined,
                                      color: Colors.grey[400]),
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
                                "Nama",
                                style: TextStyle(
                                  fontSize: 16,
                                  fontWeight: FontWeight.w400,
                                ),
                              ),
                              const SizedBox(height: 7),
                              TextFormField(
                                onChanged: (value) =>
                                    controller.nama.value = value,
                                initialValue: controller.nama.value,
                                decoration: InputDecoration(
                                  contentPadding: const EdgeInsets.symmetric(
                                      vertical: 10, horizontal: 12),
                                  hintText: 'Type your name',
                                  hintStyle: TextStyle(
                                    color: Colors.grey[400],
                                    fontWeight: FontWeight.w400,
                                  ),
                                  enabledBorder: OutlineInputBorder(
                                    borderSide: const BorderSide(
                                        color: Colors.transparent),
                                    borderRadius: BorderRadius.circular(15.0),
                                  ),
                                  focusedBorder: OutlineInputBorder(
                                    borderSide: const BorderSide(
                                        color: Color(0xFF16A085)),
                                    borderRadius: BorderRadius.circular(15.0),
                                  ),
                                  filled: true,
                                  fillColor: Colors.blueGrey.withOpacity(0.1),
                                  prefixIcon: Icon(Icons.person_outline,
                                      color: Colors.grey[400]),
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
                                value: controller.jenisKelamin.value,
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
                                onChanged: (value) => {},
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
                                    borderSide: const BorderSide(
                                        color: Colors.transparent),
                                    borderRadius: BorderRadius.circular(15.0),
                                  ),
                                  focusedBorder: OutlineInputBorder(
                                    borderSide: const BorderSide(
                                        color: Color(0xFF16A085)),
                                    borderRadius: BorderRadius.circular(15.0),
                                  ),
                                  filled: true,
                                  fillColor: Colors.blueGrey.withOpacity(0.1),
                                  prefixIcon: Icon(Icons.wc_outlined,
                                      color: Colors.grey[400]),
                                ),
                                isExpanded: false,
                              ),
                              const SizedBox(height: 10.0),
                              const Text(
                                "Email",
                                style: TextStyle(
                                  fontSize: 16,
                                  fontWeight: FontWeight.w400,
                                ),
                              ),
                              const SizedBox(height: 7),
                              TextFormField(
                                onChanged: (value) =>
                                    controller.email.value = value,
                                initialValue: controller.email.value,
                                decoration: InputDecoration(
                                  contentPadding: const EdgeInsets.symmetric(
                                      vertical: 10, horizontal: 12),
                                  hintText: 'Enter your current profession',
                                  hintStyle: TextStyle(
                                    color: Colors.grey[400],
                                    fontWeight: FontWeight.w400,
                                  ),
                                  enabledBorder: OutlineInputBorder(
                                    borderSide: const BorderSide(
                                        color: Colors.transparent),
                                    borderRadius: BorderRadius.circular(15.0),
                                  ),
                                  focusedBorder: OutlineInputBorder(
                                    borderSide: const BorderSide(
                                        color: Color(0xFF16A085)),
                                    borderRadius: BorderRadius.circular(15.0),
                                  ),
                                  filled: true,
                                  fillColor: Colors.blueGrey.withOpacity(0.1),
                                  prefixIcon: Icon(Icons.email_outlined,
                                      color: Colors.grey[400]),
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
                                initialValue: controller.profesi.value,
                                decoration: InputDecoration(
                                  contentPadding: const EdgeInsets.symmetric(
                                      vertical: 10, horizontal: 12),
                                  hintText: 'Enter your current profession',
                                  hintStyle: TextStyle(
                                    color: Colors.grey[400],
                                    fontWeight: FontWeight.w400,
                                  ),
                                  enabledBorder: OutlineInputBorder(
                                    borderSide: const BorderSide(
                                        color: Colors.transparent),
                                    borderRadius: BorderRadius.circular(15.0),
                                  ),
                                  focusedBorder: OutlineInputBorder(
                                    borderSide: const BorderSide(
                                        color: Color(0xFF16A085)),
                                    borderRadius: BorderRadius.circular(15.0),
                                  ),
                                  filled: true,
                                  fillColor: Colors.blueGrey.withOpacity(0.1),
                                  prefixIcon: Icon(Icons.work_outline,
                                      color: Colors.grey[400]),
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
                                "Kontak",
                                style: TextStyle(
                                  fontSize: 16,
                                  fontWeight: FontWeight.w400,
                                ),
                              ),
                              const SizedBox(height: 7),
                              TextFormField(
                                onChanged: (value) =>
                                    controller.nomorHp.value = value,
                                initialValue: controller.nomorHp.value,
                                decoration: InputDecoration(
                                  contentPadding: const EdgeInsets.symmetric(
                                      vertical: 10, horizontal: 12),
                                  hintText: 'Enter your current profession',
                                  hintStyle: TextStyle(
                                    color: Colors.grey[400],
                                    fontWeight: FontWeight.w400,
                                  ),
                                  enabledBorder: OutlineInputBorder(
                                    borderSide: const BorderSide(
                                        color: Colors.transparent),
                                    borderRadius: BorderRadius.circular(15.0),
                                  ),
                                  focusedBorder: OutlineInputBorder(
                                    borderSide: const BorderSide(
                                        color: Color(0xFF16A085)),
                                    borderRadius: BorderRadius.circular(15.0),
                                  ),
                                  filled: true,
                                  fillColor: Colors.blueGrey.withOpacity(0.1),
                                  prefixIcon: Icon(Icons.phone,
                                      color: Colors.grey[400]),
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
                                onChanged: (value) =>
                                    controller.alamat.value = value,
                                initialValue: controller.alamat.value,
                                decoration: InputDecoration(
                                  contentPadding: const EdgeInsets.symmetric(
                                      vertical: 10, horizontal: 12),
                                  hintText: 'Enter your current address',
                                  hintStyle: TextStyle(
                                    color: Colors.grey[400],
                                    fontWeight: FontWeight.w400,
                                  ),
                                  enabledBorder: OutlineInputBorder(
                                    borderSide: const BorderSide(
                                        color: Colors.transparent),
                                    borderRadius: BorderRadius.circular(15.0),
                                  ),
                                  focusedBorder: OutlineInputBorder(
                                    borderSide: const BorderSide(
                                        color: Color(0xFF16A085)),
                                    borderRadius: BorderRadius.circular(15.0),
                                  ),
                                  filled: true,
                                  fillColor: Colors.blueGrey.withOpacity(0.1),
                                  prefixIcon: Icon(Icons.home_outlined,
                                      color: Colors.grey[400]),
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
                            ],
                          ),
                        ),
                      ),
                    ),
                    Align(
                      alignment: Alignment.bottomCenter,
                      child: Container(
                        padding: const EdgeInsets.only(top: 15),
                        width: Get.width,
                        child: ElevatedButton(
                            onPressed: () {
                              if (_formKey.currentState!.validate()) {
                                controller.updateProfile();
                              }
                            },
                            style: ElevatedButton.styleFrom(
                              backgroundColor: const Color(0xFF16A085),
                              foregroundColor: Colors.white,
                              padding: const EdgeInsets.symmetric(vertical: 15),
                            ),
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
                                      'Update Profile',
                                      style: TextStyle(fontSize: 18),
                                    );
                            })),
                      ),
                    ),
                  ],
                ),
        ),
      ),
    );
  }
}
