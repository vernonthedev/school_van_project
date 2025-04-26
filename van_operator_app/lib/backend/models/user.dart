class User {
  final int id;
  final String name;
  final String email;
  final String role;
  final List<String> abilities;

  User({
    required this.id,
    required this.name,
    required this.email,
    required this.role,
    required this.abilities,
  });

  factory User.fromJson(Map<String, dynamic> json) {
    return User(
      id: json['user']['id'],
      name: json['user']['name'],
      email: json['user']['email'],
      role: json['user']['role'],
      abilities: List<String>.from(json['abilities']),
    );
  }
}
