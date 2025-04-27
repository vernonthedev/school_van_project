import 'package:flutter/material.dart';
import 'package:google_fonts/google_fonts.dart';
import 'package:icons_plus/icons_plus.dart';
import 'package:provider/provider.dart';
import '../../backend/providers/auth_provider.dart';
import '../widgets/profile_option.dart';

class ProfileScreen extends StatelessWidget {
  const ProfileScreen({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: Colors.white,
      appBar: AppBar(
        backgroundColor: Colors.white,
        elevation: 0,
        automaticallyImplyLeading: false,
        title: Text(
          "User Profile",
          style: GoogleFonts.poppins(
            fontSize: 20,
            fontWeight: FontWeight.w600,
            color: Colors.black,
          ),
        ),
        centerTitle: true,
      ),
      body: SingleChildScrollView(
        child: Column(
          children: [
            const SizedBox(height: 20),
            // Profile Image
            Center(
              child: Stack(
                children: [
                  Container(
                    width: 100,
                    height: 100,
                    decoration: BoxDecoration(
                      shape: BoxShape.circle,
                      color: Colors.grey[200],
                    ),
                    child: Icon(Icons.verified_user),
                  ),
                ],
              ),
            ),
            const SizedBox(height: 16),

            // Name
            Text(
              "Name",
              style: GoogleFonts.poppins(
                fontSize: 24,
                fontWeight: FontWeight.w600,
              ),
            ),
            const SizedBox(height: 4),

            // Email
            Text(
              "Email",
              style: GoogleFonts.poppins(fontSize: 14, color: Colors.grey[600]),
            ),
            const SizedBox(height: 32),

            // Profile Options
            profileOption(
              icon: Icons.person_outline,
              title: "Account Info",
              iconColor: Colors.blue,
              onTap: () {},
            ),
            profileOption(
              icon: Icons.settings,
              title: "App Settings",
              iconColor: Colors.blue,
              onTap: () {},
            ),
            profileOption(
              icon: Icons.lock_outline,
              title: "Change Password",
              iconColor: Colors.red,
              onTap: () {},
            ),

            profileOption(
              icon: AntDesign.user_delete_outline,
              title: "Logout",
              iconColor: Colors.green,
              onTap: () async {
                Navigator.pop(context);
                try {
                  await Provider.of<AuthProvider>(
                    context,
                    listen: false,
                  ).logout();
                  // Navigation is handled by AuthWrapper
                } catch (e) {
                  // we are checking to see if the widget has been disposed before we render the snackbar.
                  if (!context.mounted) return;

                  ScaffoldMessenger.of(context).showSnackBar(
                    SnackBar(content: Text('Logout failed: ${e.toString()}')),
                  );
                }
              },
            ),
          ],
        ),
      ),
    );
  }
}
